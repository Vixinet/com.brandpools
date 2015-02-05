var app = {

  currentScreen: null,
  currentSection: null,
  isAuth: false,

  initialize: function() {
    $(document).ready(app.onDeviceReady);
  },
  
  bindEvents: function() {
    $(document).on('didLoad', app.didNavigate);
    $(document).on('click', 'a[data-screen]', app.doNavigate);
    $(document).on('submit', '[action]', app.doAction)
    $(document).on('click', '[action]', app.doAction)
  },

  onDeviceReady: function() {
    app.receivedEvent('ready');
    
    app.bindEvents();

    if(app.isAuth) {
      app.setupNavigation();
      app.doNavigate('accounts');
    } else {
      app.doNavigate('signIn');
    }
  },

  setupNavigation: function() {
    app.receivedEvent('setupNavigation');
    $.ajax({
      url: 'app.navigation.html',
      async: false
    }).done(function(data) {
      $('body').append($(data));
    });
  },

  doNavigate: function(screen, action) {
    app.receivedEvent('doNavigate:' + screen);
    app.currentScreen = screen == null ? $(this).attr('data-screen') : screen;
    app.currentSection = action == null ? 'index' : action;

    if(app.screen[app.currentScreen].doNavigate) {
      app.screen[app.currentScreen].doNavigate();
    } else {
      app.doLoadScreen();
    }
  },

  didNavigate: function() {
    app.receivedEvent('didNavigate:' + app.currentScreen + ':' + app.currentSection);
    $('ul.nav .active').removeClass('active');
    $('a[data-screen="'+app.currentScreen+'"]').closest('li').addClass('active');
    app.screen[app.currentScreen].didNavigate();
  },

  doLoadScreen: function() {
    $.ajax({
      url: 'screen.'+app.currentScreen+'.html',
      async: false
    }).done(function(data) {
      var content = $(data).find('div[data-section="'+app.currentSection+'"]');
      $('body .content').html(content);
      $(document).trigger('didLoad');
    });
  },

  doAction: function() {
    event.preventDefault();
    app.screen[app.currentScreen][app.currentSection][$(this).attr('action')]();
  },

  screen: {
    signIn: {
      didNavigate: function() {

      },

      index: {
        login: function() {
          // try login

          if(true) {
            app.doNavigate('accounts');
          } else {
            app.error('Invalid user / password.');
          }
        }
      }
    },

    accounts: {
      didNavigate : function() {
        /* Nothing */
      },

      index: {
        edit: function() {
          alert('edit '+$(this).attr('id'));
          doNavigate('accounts', 'edit');
        },
        delete: function() {

        }
      }
    },

    products: {
      didNavigate : function() {
        /* Nothing */
      },

      doNavigate: function(action) {

      },

      index: {
        edit: function() {

        }, 
        delete: function() {

        }
      },
      product: {

      }
    }
  },

  thread: function(f, timer) {
    setTimeout(f, timer);
  },

  receivedEvent: function(id) {
    console.log('Received Event: ' + id);
  }
};

app.initialize();



