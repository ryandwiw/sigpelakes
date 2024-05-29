@extends('layouts.users.master')
@section('title')
@if (Auth::user()->role =='admin')
    SIGPELAKES - ADMIN
@else
    SIGPELAKES - USER
@endif
@endsection
@section('isi')
    <div class="container">
        <h1>Detail Rumah Sakit</h1>
        <div class="table-responsive">
            <table class="table mt-4">
                <tbody>
                    <tr>
                        <td>No. RS:</td>
                        <td>{{ $rumahsakit->no_rs }}</td>
                    </tr>
                    <tr>
                        <td>Nama Rumah Sakit:</td>
                        <td>{{ $rumahsakit->nama_rumahsakit }}</td>
                    </tr>
                    <tr>
                        <td>Alamat:</td>
                        <td>{{ $rumahsakit->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No. Telepon:</td>
                        <td>{{ $rumahsakit->no_telp }}</td>
                    </tr>
                    <tr>
                        <td>Jam Kerja:</td>
                        <td>{{ $rumahsakit->jam_kerja }}</td>
                    </tr>
                    <tr>
                        <td>Fasilitas:</td>
                        <td>{{ $rumahsakit->fasilitas }}</td>
                    </tr>
                    <tr>
                        <td>Latitude:</td>
                        <td>{{ $rumahsakit->latitude }}</td>
                    </tr>
                    <tr>
                        <td>Longitude:</td>
                        <td>{{ $rumahsakit->longitude }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="map" class="mt-4"></div>
        <a href="{{ route('admin.index') }}" class="btn btn-primary mt-4" onclick="pindah(event)">Kembali</a>
    </div>


    <script>
        var map = L.map('map').setView([{{ $rumahsakit->latitude }}, {{ $rumahsakit->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Titik Koordinat Berada Pada: " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

        L.Control.geocoder().addTo(map);
        L.control.locate().addTo(map);

        var marker = L.marker([{{ $rumahsakit->latitude }}, {{ $rumahsakit->longitude }}]).addTo(map);

        marker.bindPopup("<b>{{ $rumahsakit->nama_rumahsakit }}</b><br>"+
        "<br> Alamat : {{ $rumahsakit->alamat }} <br>" +
        "<br> No Telp : {{ $rumahsakit->no_telp }} <br> " +
        "<br> Jam Kerja : {{ $rumahsakit->jam_kerja }} <br> " +
        "<br> Fasilitas : {{ $rumahsakit->fasilitas }} <br> "
        ).openPopup();

    </script>


@endsection
