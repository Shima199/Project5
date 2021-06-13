@extends('layouts.app2')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header bg-primary">
                    <p>Bus</p>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td style="width: 250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td colspan="2">
                                <img style="display:none;width: 90px;height: 90px;" id="driver_show"
                                     src="{!! URL::asset('images/driver.png') !!}">
                            </td>
                        </tr>
                    </table>
                    <div id="bus_load">

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-primary">
                    <p></p>
                </div>
                <div class="card-body">
                    <?php
                   $buses = \App\Models\Bus::all();
                    ?>
                    <form id="tiket_booking_save">
                        {{csrf_field()}}

                        <table>
                            <tr>
                            <tr>
                                <td>Sourche Counter</td>
                                <td>
                                    <select name="source" class="form-control" id="source">
                                        <option value="">Select Source Counter</option>
                                        <?php
                                        foreach ($buses as $bus)
                                        {
                                        ?>
                                        <option><?php echo $bus->depart?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Destination Counter</td>
                                <td>
                                    <select name="destination" onchange="bus_load()" class="form-control" id="destination">
                                        <option value="">Select Destination Counter</option>
                                        <?php
                                        foreach ($buses as $bus)
                                        {
                                        ?>
                                        <option><?php echo $bus->arrive?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>
                                    <select name="bus_id" onchange="bus_seat_laod(this.value),seat_load(this.value)"
                                            class="form-control"
                                            id="bus_id">
                                        <option value="">Select Bus</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Unbooked Seat</td>
                                <td>
                                    <select name="seat" class="form-control" id="seat">
                                        <option value="">Select Seat</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Passenger Name
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Passenger name" class="form-control"
                                           name="passenger_name" id="passenger_name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mobile
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Mobile" class="form-control" name="mobile"
                                           id="mobile">
                                </td>
                            </tr>
                            <tr>
                                <td><img style="display:none;position:fixed;z-index:1;width: 60px;height: 60px;" id="loader"
                                         src="{!! URL::asset('images/loader.gif') !!}"></td>
                                <td>
                                    <input id="ticket_save_button" type="button" value="Ticket Book"
                                           onclick="tiket_booking_save()"
                                           class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>

    </div>

    <script>
        function seat_load(bus_id) {
            $('#loader').show();
            $.ajax({
                type: "GET",
                url: "{{ route('seat_load') }}",
                data: {bus_id: bus_id},
                success: function (data) {
                    $('#loader').hide();
                    $('#driver_show').show();

                    document.getElementById("seat").innerHTML = data;

                }
            });
        }

        function tiket_booking_save() {
            $('#ticket_save_button').prop("disabled", true);
            var passenger_name = $('#passenger_name').val();
            var mobile = $('#mobile').val();
            var seat = $('#seat').val();
            var bus_id = $('#bus_id').val();
            var destination = $('#destination').val();
            var source = $('#source').val();
            if (passenger_name == '') {
                $('#ticket_save_button').prop("disabled", false);
                alert('Please Enter Customer Name!');
                $('#passenger_name').focus();
            } else if (mobile == '') {
                $('#ticket_save_button').prop("disabled", false);
                alert('Please Enter Mobile!');
                $('#passenger_name').focus();
            } else {
                var formData = new FormData(document.getElementById('tiket_booking_save'));
                $.ajax({
                        type: "POST",
                        url: '{{ route('tiket_booking_save') }}',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (result) {
                            $('#ticket_save_button').prop("disabled", false);
                            $('#passenger_name').val('');
                            $('#mobile').val('');
                            document.getElementById("bus_load").innerHTML = result;

                        }
                    }
                );
            }

        }

        function bus_seat_laod(bus_id) {
            $('#loader').show();
            $.ajax({
                type: "GET",
                url: "{{ route('bus_seat_laod') }}",
                data: {bus_id: bus_id},
                success: function (data) {
                    $('#loader').hide();
                    $('#driver_show').show();

                    document.getElementById("bus_load").innerHTML = data;

                }
            });
        }

        function bus_load() {
            $('#loader').show();
            var destination = $('#destination').val();
            var source = $('#source').val();
            $.ajax({
                type: "GET",
                url: "{{ route('bus_load') }}",
                data: {destination: destination, source: source},
                success: function (data) {
                    $('#loader').hide();
                    document.getElementById("bus_id").innerHTML = data;

                }
            });
        }
    </script>
@endsection
