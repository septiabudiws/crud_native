</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->



		<!--**********************************
            Footer start
        ***********************************-->
		<footer class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="http://yosibgsdr.site/" target="_blank">Yosi
						Bagus</a> 2023</p>
			</div>
		</footer>
		<!--**********************************
            Footer end
        ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end

        ***********************************-->

	<!-- Required vendors -->
	<script src="assets/vendor/global/global.min.js"></script>
	<script src="assets/vendor/chart-js/chart.bundle.min.js"></script>
	<script src="assets/vendor/owl-carousel/owl.carousel.js"></script>
	<!-- Chart piety plugin files -->
	<script src="assets/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="assets/vendor/apexchart/apexchart.js"></script>

	<!-- Datatable -->
	<script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="assets/js/dashboard/dashboard-1.js"></script>

	<script src="assets/js/plugins-init/datatables.init.js"></script>
	<script src="assets/js/custom.min.js"></script>
	<script src="assets/js/deznav-init.js"></script>
	<script>
		(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>


</body>

</html>