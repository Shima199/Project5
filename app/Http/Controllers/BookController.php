<?php

namespace App\Http\Controllers;

use App\Models\BusSeat;
use App\Models\SeatBooking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Bus;
class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('book');
    }

    public function bus_load()
    {
        $destination = $_GET['destination'];
        $source = $_GET['source'];
        $buses = Bus::where('arrive', $destination)->where('depart', $source)->get();
        ?>
        <option>Select Bus</option>
        <?php
        foreach ($buses as $buse) {
            ?>
            <option value="<?php echo $buse->bus_id ?>"><?php echo $buse->bus_code ?></option>
            <?php
        }
    }

    public function seat_load()
    {
        $bus_id = $_GET['bus_id'];
        $buseseats = BusSeat::where('bus_id', $bus_id)->get();
        ?>
        <option>Select Bus Seat</option>
        <?php
        foreach ($buseseats as $buseseat) {
            if ($buseseat->A1 == 0) {
                ?>
                <option>A1</option>
                <?php
            }
            if ($buseseat->A2 == 0) {
                ?>
                <option>A2</option>
                <?php
            }
            if ($buseseat->A3 == 0) {
                ?>
                <option>A3</option>
                <?php
            }
            if ($buseseat->A4 == 0) {
                ?>
                <option>A4</option>
                <?php
            }

            if ($buseseat->B1 == 0) {
                ?>
                <option>B1</option>
                <?php
            }
            if ($buseseat->B2 == 0) {
                ?>
                <option>B2</option>
                <?php
            }
            if ($buseseat->B3 == 0) {
                ?>
                <option>B3</option>
                <?php
            }
            if ($buseseat->B4 == 0) {
                ?>
                <option>B4</option>
                <?php
            }


            if ($buseseat->C1 == 0) {
                ?>
                <option>C1</option>
                <?php
            }
            if ($buseseat->C2 == 0) {
                ?>
                <option>C2</option>
                <?php
            }
            if ($buseseat->C3 == 0) {
                ?>
                <option>C3</option>
                <?php
            }
            if ($buseseat->C4 == 0) {
                ?>
                <option>C4</option>
                <?php
            }

            if ($buseseat->D1 == 0) {
                ?>
                <option>D1</option>
                <?php
            }
            if ($buseseat->D2 == 0) {
                ?>
                <option>D2</option>
                <?php
            }
            if ($buseseat->D3 == 0) {
                ?>
                <option>D3</option>
                <?php
            }
            if ($buseseat->D4 == 0) {
                ?>
                <option>D4</option>
                <?php
            }

            if ($buseseat->E1 == 0) {
                ?>
                <option>E1</option>
                <?php
            }
            if ($buseseat->E2 == 0) {
                ?>
                <option>E2</option>
                <?php
            }
            if ($buseseat->E3 == 0) {
                ?>
                <option>E3</option>
                <?php
            }
            if ($buseseat->E4 == 0) {
                ?>
                <option>E4</option>
                <?php
            }


            if ($buseseat->F1 == 0) {
                ?>
                <option>F1</option>
                <?php
            }
            if ($buseseat->F2 == 0) {
                ?>
                <option>F2</option>
                <?php
            }
            if ($buseseat->F3 == 0) {
                ?>
                <option>F3</option>
                <?php
            }
            if ($buseseat->F4 == 0) {
                ?>
                <option>F4</option>
                <?php
            }


            if ($buseseat->G1 == 0) {
                ?>
                <option>G1</option>
                <?php
            }
            if ($buseseat->G2 == 0) {
                ?>
                <option>G2</option>
                <?php
            }
            if ($buseseat->G3 == 0) {
                ?>
                <option>G3</option>
                <?php
            }
            if ($buseseat->G4 == 0) {
                ?>
                <option>G4</option>
                <?php
            }


            if ($buseseat->H1 == 0) {
                ?>
                <option>H1</option>
                <?php
            }
            if ($buseseat->H2 == 0) {
                ?>
                <option>H2</option>
                <?php
            }
            if ($buseseat->H3 == 0) {
                ?>
                <option>H3</option>
                <?php
            }
            if ($buseseat->H4 == 0) {
                ?>
                <option>H4</option>
                <?php
            }
        }
    }

    public function tiket_booking_save()
    {
        $seat_booking = new SeatBooking() ;

        $seat_booking->bus_id = $_POST['bus_id'];
        $seat_booking->seat =$_POST['seat'];
        $seat_booking->passenger_name =$_POST['passenger_name'];
        $seat_booking->mobile =$_POST['mobile'];
        $seat_booking->save();

        BusSeat::where('bus_id', $_POST['bus_id'])
            ->update([
                $_POST['seat'] => '1'
            ]);

        $bus_seats = BusSeat::where('bus_id', $_POST['bus_id'])->get();
        ?>
        <table>


            <?php
            foreach ($bus_seats as $bus_seat) {
//                echo '<pre>';
//                print_r($bus_seat);
                $button_type = '';
                ?>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->A1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A1 == '1' ? 'btn-danger' : 'btn-success' ?>">A1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->A2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A2 == '1' ? 'btn-danger' : 'btn-success' ?>">A2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->A3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A3 == 1 ? 'btn-danger' : 'btn-success' ?>">A3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->A4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A4 == 1 ? 'btn-danger' : 'btn-success' ?>">A4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->B1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B1 == '1' ? 'btn-danger' : 'btn-success' ?>">B1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->B2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B2 == '1' ? 'btn-danger' : 'btn-success' ?>">B2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->B3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B3 == 1 ? 'btn-danger' : 'btn-success' ?>">B3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->B4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B4 == 1 ? 'btn-danger' : 'btn-success' ?>">B4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->C1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C1 == '1' ? 'btn-danger' : 'btn-success' ?>">C1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->C2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C2 == '1' ? 'btn-danger' : 'btn-success' ?>">C2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->C3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C3 == 1 ? 'btn-danger' : 'btn-success' ?>">C3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->C4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C4 == 1 ? 'btn-danger' : 'btn-success' ?>">C4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->D1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D1 == '1' ? 'btn-danger' : 'btn-success' ?>">D1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->D2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D2 == '1' ? 'btn-danger' : 'btn-success' ?>">D2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->D3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D3 == 1 ? 'btn-danger' : 'btn-success' ?>">D3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->D4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D4 == 1 ? 'btn-danger' : 'btn-success' ?>">D4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->E1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E1 == '1' ? 'btn-danger' : 'btn-success' ?>">E1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->E2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E2 == '1' ? 'btn-danger' : 'btn-success' ?>">E2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->E3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E3 == 1 ? 'btn-danger' : 'btn-success' ?>">E3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->E4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E4 == 1 ? 'btn-danger' : 'btn-success' ?>">E4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->F1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F1 == '1' ? 'btn-danger' : 'btn-success' ?>">F1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->F2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F2 == '1' ? 'btn-danger' : 'btn-success' ?>">F2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->F3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F3 == 1 ? 'btn-danger' : 'btn-success' ?>">F3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->F4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F4 == 1 ? 'btn-danger' : 'btn-success' ?>">F4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->G1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G1 == '1' ? 'btn-danger' : 'btn-success' ?>">G1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->G2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G2 == '1' ? 'btn-danger' : 'btn-success' ?>">G2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->G3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G3 == 1 ? 'btn-danger' : 'btn-success' ?>">G3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->G4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G4 == 1 ? 'btn-danger' : 'btn-success' ?>">G4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->H1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H1 == '1' ? 'btn-danger' : 'btn-success' ?>">H1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->h2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H2 == '1' ? 'btn-danger' : 'btn-success' ?>">H2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->H3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H3 == 1 ? 'btn-danger' : 'btn-success' ?>">H3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->H4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H4 == 1 ? 'btn-danger' : 'btn-success' ?>">H4
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

    public function bus_seat_laod()
    {
        $bus_id = $_GET['bus_id'];
        $bus_seats = BusSeat::where('bus_id', $bus_id)->get();
        ?>
        <table>


            <?php
            foreach ($bus_seats as $bus_seat) {
//                echo '<pre>';
//                print_r($bus_seat);
                $button_type = '';
                ?>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->A1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A1 == '1' ? 'btn-danger' : 'btn-success' ?>">A1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->A2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A2 == '1' ? 'btn-danger' : 'btn-success' ?>">A2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->A3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A3 == 1 ? 'btn-danger' : 'btn-success' ?>">A3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->A4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->A4 == 1 ? 'btn-danger' : 'btn-success' ?>">A4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->B1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B1 == '1' ? 'btn-danger' : 'btn-success' ?>">B1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->B2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B2 == '1' ? 'btn-danger' : 'btn-success' ?>">B2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->B3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B3 == 1 ? 'btn-danger' : 'btn-success' ?>">B3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->B4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->B4 == 1 ? 'btn-danger' : 'btn-success' ?>">B4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->C1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C1 == '1' ? 'btn-danger' : 'btn-success' ?>">C1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->C2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C2 == '1' ? 'btn-danger' : 'btn-success' ?>">C2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->C3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C3 == 1 ? 'btn-danger' : 'btn-success' ?>">C3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->C4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->C4 == 1 ? 'btn-danger' : 'btn-success' ?>">C4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->D1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D1 == '1' ? 'btn-danger' : 'btn-success' ?>">D1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->D2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D2 == '1' ? 'btn-danger' : 'btn-success' ?>">D2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->D3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D3 == 1 ? 'btn-danger' : 'btn-success' ?>">D3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->D4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->D4 == 1 ? 'btn-danger' : 'btn-success' ?>">D4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->E1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E1 == '1' ? 'btn-danger' : 'btn-success' ?>">E1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->E2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E2 == '1' ? 'btn-danger' : 'btn-success' ?>">E2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->E3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E3 == 1 ? 'btn-danger' : 'btn-success' ?>">E3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->E4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->E4 == 1 ? 'btn-danger' : 'btn-success' ?>">E4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->F1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F1 == '1' ? 'btn-danger' : 'btn-success' ?>">F1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->F2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F2 == '1' ? 'btn-danger' : 'btn-success' ?>">F2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->F3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F3 == 1 ? 'btn-danger' : 'btn-success' ?>">F3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->F4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->F4 == 1 ? 'btn-danger' : 'btn-success' ?>">F4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->G1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G1 == '1' ? 'btn-danger' : 'btn-success' ?>">G1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->G2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G2 == '1' ? 'btn-danger' : 'btn-success' ?>">G2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->G3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G3 == 1 ? 'btn-danger' : 'btn-success' ?>">G3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->G4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->G4 == 1 ? 'btn-danger' : 'btn-success' ?>">G4
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button title=" <?php echo $bus_seat->H1 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H1 == '1' ? 'btn-danger' : 'btn-success' ?>">H1
                        </button>
                        </button></td>
                    <td>
                        <button title=" <?php echo $bus_seat->h2 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H2 == '1' ? 'btn-danger' : 'btn-success' ?>">H2
                        </button>
                    </td>
                    <td style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <button title=" <?php echo $bus_seat->H3 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H3 == 1 ? 'btn-danger' : 'btn-success' ?>">H3
                        </button>
                    </td>
                    <td>
                        <button title=" <?php echo $bus_seat->H4 == '1' ? 'Booked' : 'Free' ?>"
                                class="btn <?php echo $bus_seat->H4 == 1 ? 'btn-danger' : 'btn-success' ?>">H4
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php

    }

}
