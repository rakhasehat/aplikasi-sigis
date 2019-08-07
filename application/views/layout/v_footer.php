<footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('login/logout') ?>">Logout</a>
          </div>
        </div>
			</div>
		</div>



	<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	
	<script src="<?= base_url('assets/js/bootstrap-tab-modal.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
				$('#dataTable').DataTable();
			});
		</script>

		<!-- LEAFLEET JS  -->
		<script>

var markers = new L.layerGroup();
var polylines;
var marks;
var revise = document.querySelector('#revise');
var deleteAll = document.querySelector('#deleteAll');
var line = [];
// var line2 = [];
// var line3 = [];
var marker;
// var marker2;
// var marker3;
// Creating map options
var mapOptions = {
  center: [-7.9747952, 112.6485342],
  zoom: 15
}
var markerOptions = {
  title: 'My Locations',
  clickable: true,
  draggable: true,
}
// Creating a map object
var map = new L.map('map', mapOptions);
// var map2 = new L.map('map2', mapOptions);
// var map3 = new L.map('map3', mapOptions);
// Creating a Layer object
var layer = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
// var layer2 = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
// var layer3 = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
// Adding layer to the map
map.addLayer(layer);
	// map2.addLayer(layer2);
	// map3.addLayer(layer3);
// Reuseable Func 
var dynamicMarker = (marker, map, line, id, id2) => {
  return map.on('click', (e) => {
	if (marks) {
	  map.removeLayer(marks)
	}
	marks = new L.marker([e.latlng.lat, e.latlng.lng], { color: 'red' }).addTo(map);
	line.push([e.latlng.lat, e.latlng.lng]);
	polylines = new L.polyline(line, { color: 'red' }).addTo(map);
	document.querySelector(`#${id}`).removeAttribute('disabled');
	document.querySelector(`#${id2}`).removeAttribute('disabled');
  })
}
// Adding A line 
dynamicMarker(marker, map, line, 'revise', 'deleteAll');
// dynamicMarker(marker2, map2, line2, 'revise2','deleteAll2');
// dynamicMarker(marker3, map3, line3, 'revise3','deleteAll3');

// Load Full Map
var showMap = () => {
  setTimeout(() => {
	map.invalidateSize();
	// map2.invalidateSize();
	// map3.invalidateSize();
  }, 1000)
}

//Revisi Garis
var revise = ( map={}, poly=[] ) => {
  for (i in map._layers) {
	if (map._layers[i]._path != undefined) {
	  try {
		map.removeLayer(map._layers[i]);
		map.removeLayer(marks);
		poly.pop();
	  } catch (e) {
		console.log("problem with " + e + map._layers[i]);
	  }
	}
  }
}
var revisiGaris = (map={}, line=[], id) => {
  console.log(line)
  if (line.length == 1) {
	removeAllGaris(map, line,id);
	disableBtn(id);
  } else {
	revise(map);
	map.removeLayer(marks);
	line.pop();
	polylines = new L.polyline(line, { color: 'red' }).addTo(map);
	marks = new L.Marker(line[line.length - 1], { color: 'red' }).addTo(map);
  }
}
var removeAllGaris = (map, line,id) => {
  disableBtn(id);
  revise(map, line);
  line.length = 0;
}
//DOM SELECTOR
function domSelector(id){
  return document.querySelector(`#${id}`).setAttribute('disabled', "");
}
//BTN Controller 
function disableBtn(id) {
  domSelector(`revise${id}`);
  domSelector(`deleteAll${id}`);
}
//IIFE
(() => {
  document.querySelector('#revise').setAttribute('disabled', "");
  document.querySelector('#deleteAll').setAttribute('disabled', "");
  // document.querySelector('#revise2').setAttribute('disabled', "");
  // document.querySelector('#deleteAll2').setAttribute('disabled', "");
  // document.querySelector('#revise3').setAttribute('disabled', "");
  // document.querySelector('#deleteAll3').setAttribute('disabled', "");
})();

// DOM
document.getElementById("revise").addEventListener("click", ()=>{
  revisiGaris(map, line, '');
});
document.getElementById("deleteAll").addEventListener("click", ()=>{
  removeAllGaris(map, line, '');
});
document.getElementById("revise2").addEventListener("click", ()=>{
  revisiGaris(map2, line2, '2');
});
document.getElementById("deleteAll2").addEventListener("click", ()=>{
  removeAllGaris(map2, line2, '2');
});
document.getElementById("revise3").addEventListener("click", ()=>{
  revisiGaris(map3, line3, '3');
});
document.getElementById("deleteAll3").addEventListener("click", ()=>{
  removeAllGaris(map3, line3, '3');
});
</script>
				
</body>

</html>
