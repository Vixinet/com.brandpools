							<?php
								if(isset($p)) UX_Pagination($p);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header text-danger">
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
						<h4 class="modal-title text-center">Delete</h4>
					</div>
					<div class="modal-body"> </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger btn-confirm">Yes</button>
					</div>
				</div>
			</div>
		</div>

		<script src="vendors/js/jquery-2.1.1.min.js"></script>
		<script src="vendors/js/bootstrap.min.js"></script>
		<script src="vendors/js/main.js"></script>
	</body>
</html>

<?php shutdown(); ?>