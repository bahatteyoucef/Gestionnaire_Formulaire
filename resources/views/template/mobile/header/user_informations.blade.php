<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row" id="user_informations_nav">

    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>

        <div id="mobile_header_div">
            <div id="user_informations_div">
                <table id="user_informations_table">
                    <thead>

                        <th id="user_circle_header">
                            <div id="user_circle">
                                <p>

                                    <?php

                                    use Illuminate\Support\Facades\Auth;

                                    $words = explode(" ", Auth::user()->name);
                                    $acronym = "";

                                    foreach ($words as $w) {
                                        $acronym .= $w[0];
                                    }

                                    echo $acronym

                                    ?>

                                </p>
                            </div>
                        </th>

                        <th id="user_informations_header">
                            <div id="user_informations">
                                <div id="user_name">
                                    <h2 style="margin: 0px;"> <b><?php echo Auth::user()->name ?> </b></h2>
                                </div>
                                <div id="user_points">
                                    <p> <b>Points : 450 </b></p>
                                </div>
                            </div>
                        </th>
                    </thead>
                </table>
            </div>
            
        </div>
    </div>

</nav>
