@extends('layouts.app')

@section('title', 'Tambah Rute Pengiriman Baru')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Tambah Rute Pengiriman Baru
                    </h2>
                    <div class="text-muted mt-1">Buat rute pengiriman baru untuk armada</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.routes') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <form action="#" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Rute</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label required">Kode Rute</label>
                                <input type="text" class="form-control" name="code" placeholder="Contoh: RT-001"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Nama Rute</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Contoh: Jakarta Utara - Sunter" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label required">Asal</label>
                                <input type="text" class="form-control" name="origin"
                                    placeholder="Contoh: Batching Plant Jakarta Utara" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Tujuan</label>
                                <input type="text" class="form-control" name="destination"
                                    placeholder="Contoh: Proyek Apartemen Sunter" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label required">Jarak (km)</label>
                                <input type="number" step="0.1" class="form-control" name="distance"
                                    placeholder="Contoh: 12.5" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Estimasi Waktu (menit)</label>
                                <input type="number" class="form-control" name="estimated_time" placeholder="Contoh: 45"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Kondisi Lalu Lintas</label>
                                <select class="form-select" name="traffic_conditions" required>
                                    <option value="Lancar">Lancar</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Padat">Padat</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label required">Jenis Rute</label>
                                <select class="form-select" name="type" required>
                                    <option value="Reguler">Reguler</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="Khusus">Khusus</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi rute pengiriman"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea class="form-control" name="notes" rows="2" placeholder="Catatan penting untuk rute ini"></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Rute Alternatif</label>
                                <input type="text" class="form-control" name="alternative_routes"
                                    placeholder="Contoh: Via Ancol jika terjadi kemacetan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pembatasan</label>
                                <input type="text" class="form-control" name="restrictions"
                                    placeholder="Contoh: Pembatasan jam operasional">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gerbang Tol</label>
                            <select class="form-select" name="toll_gates[]" multiple>
                                <option value="Tol Pelabuhan">Tol Pelabuhan</option>
                                <option value="Tol Cawang">Tol Cawang</option>
                                <option value="Tol Dalam Kota">Tol Dalam Kota</option>
                                <option value="Exit Kuningan">Exit Kuningan</option>
                                <option value="Tol Jakarta-Tangerang">Tol Jakarta-Tangerang</option>
                                <option value="Exit Cengkareng">Exit Cengkareng</option>
                                <option value="Tol Jakarta-Cikampek">Tol Jakarta-Cikampek</option>
                                <option value="Exit Cakung">Exit Cakung</option>
                            </select>
                            <small class="form-hint">Tekan Ctrl (atau Cmd di Mac) untuk memilih beberapa gerbang
                                tol</small>
                        </div>
                    </div>
                </form>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Titik Rute (Waypoints)</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">
                            Tambahkan titik-titik rute dengan mengklik pada peta atau masukkan secara manual.
                            Titik pertama akan menjadi titik awal dan titik terakhir akan menjadi titik akhir rute.
                        </p>

                        <div id="waypoints-container">
                            <!-- Waypoints will be added here -->
                        </div>

                        <div class="mt-3">
                            <button type="button" class="btn btn-outline-primary" onclick="addWaypoint()">
                                <i class="ti ti-plus"></i> Tambah Titik Rute
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    <a href="{{ route('delivery.routes') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Rute</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peta Rute</h3>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 500px; border-radius: 4px;"></div>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="ti ti-info-circle"></i> Klik pada peta untuk menambahkan titik rute. Drag marker
                                untuk menyesuaikan posisi.
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Bantuan</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h4>Tips Membuat Rute</h4>
                            <ul class="text-muted">
                                <li>Pastikan titik awal dan akhir rute sudah benar</li>
                                <li>Tambahkan waypoint untuk persimpangan penting</li>
                                <li>Perhatikan kondisi lalu lintas pada jam-jam tertentu</li>
                                <li>Pertimbangkan alternatif rute untuk menghindari kemacetan</li>
                                <li>Periksa pembatasan kendaraan berat di rute yang dipilih</li>
                            </ul>
                        </div>
                        <div>
                            <h4>Jenis Rute</h4>
                            <p class="text-muted">
                                <strong>Reguler:</strong> Rute standar yang digunakan untuk pengiriman rutin.<br>
                                <strong>Proyek:</strong> Rute khusus untuk proyek tertentu dengan durasi terbatas.<br>
                                <strong>Khusus:</strong> Rute dengan persyaratan atau kondisi khusus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>
    <script>
        let map;
        let markers = [];
        let routePath;

        function initMap() {
            // Initialize map centered on Jakarta
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: {
                    lat: -6.2088,
                    lng: 106.8456
                }, // Jakarta coordinates
            });

            // Add click listener to add waypoints
            map.addListener("click", (event) => {
                addMarker(event.latLng);
            });

            // Initialize route path
            routePath = new google.maps.Polyline({
                path: [],
                geodesic: true,
                strokeColor: "#0061f2",
                strokeOpacity: 1.0,
                strokeWeight: 3,
            });

            routePath.setMap(map);
        }

        function addMarker(location) {
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: true,
                label: (markers.length + 1).toString()
            });

            markers.push(marker);

            // Add a new waypoint input
            const waypointContainer = document.getElementById("waypoints-container");
            const newWaypoint = document.createElement("div");
            newWaypoint.className = "waypoint-item mb-2";
            newWaypoint.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="waypoint_names[]" placeholder="Nama lokasi">
                <button type="button" class="btn btn-outline-secondary" onclick="removeWaypoint(this)">
                    <i class="ti ti-trash"></i>
                </button>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lats[]" value="${location.lat()}" placeholder="Latitude">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lngs[]" value="${location.lng()}" placeholder="Longitude">
                </div>
            </div>
        `;
            waypointContainer.appendChild(newWaypoint);

            // Update the route path
            updateRoutePath();

            // Add listener for marker drag end
            marker.addListener("dragend", () => {
                updateWaypointCoordinates();
                updateRoutePath();
            });
        }

        function updateWaypointCoordinates() {
            const latInputs = document.getElementsByName("waypoint_lats[]");
            const lngInputs = document.getElementsByName("waypoint_lngs[]");

            for (let i = 0; i < markers.length; i++) {
                if (i < latInputs.length && i < lngInputs.length) {
                    latInputs[i].value = markers[i].getPosition().lat();
                    lngInputs[i].value = markers[i].getPosition().lng();
                }
            }
        }

        function updateRoutePath() {
            const path = markers.map(marker => marker.getPosition());
            routePath.setPath(path);
        }

        function addWaypoint() {
            const waypointContainer = document.getElementById("waypoints-container");
            const newWaypoint = document.createElement("div");
            newWaypoint.className = "waypoint-item mb-2";
            newWaypoint.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="waypoint_names[]" placeholder="Nama lokasi">
                <button type="button" class="btn btn-outline-secondary" onclick="removeWaypoint(this)">
                    <i class="ti ti-trash"></i>
                </button>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lats[]" placeholder="Latitude">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lngs[]" placeholder="Longitude">
                </div>
            </div>
        `;
            waypointContainer.appendChild(newWaypoint);
        }

        function removeWaypoint(button) {
            const waypointItem = button.closest('.waypoint-item');
            const waypointContainer = document.getElementById("waypoints-container");
            const index = Array.from(waypointContainer.children).indexOf(waypointItem);

            // Remove the marker if it exists
            if (index < markers.length) {
                markers[index].setMap(null);
                markers.splice(index, 1);

                // Update marker labels
                markers.forEach((marker, i) => {
                    marker.setLabel((i + 1).toString());
                });

                // Update the route path
                updateRoutePath();
            }

            // Remove the waypoint input
            waypointContainer.removeChild(waypointItem);
        }
    </script>
@endsection
