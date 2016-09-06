<template>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <div class="logo">
                        <img class="post-nord-logo" src="/images/postnordlogo.png">
                    </div>
                </div>
                <div class="col-xs-6 text-right">
                    <img class="commotive-logo" src="/images/commotive-logo.png" alt="Commotive Logo">
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<button @click="changeStep" class="btn btn-default">Switch</button>-->
                <!--<button @click="test_started = !test_started" class="btn btn-success">Start | {{test_started}}</button>-->
                <!--<button @click="test_running = !test_running" class="btn btn-info">Running | {{test_running}}</button>-->
                <!--<button @click="test_stopped = !test_stopped" class="btn btn-danger">Stop | {{test_stopped}}</button>-->
                <!--<button @click="this.changeOrder(1)" class="btn btn-default">Sort Vans</button>-->
                <!--<button @click="this.changeOrder(4)" class="btn btn-default">Sort Trucks</button>-->
            </div>
        </div>
    </div>
    <section class="player-score">
        <div class="section-grid" data-step="1">
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="step slidein" data-step="1">
                            <div class="list-indikator">
                                <img src="images/truck_2.png">
                                Live Lastbil
                            </div>
                            <ul class="player-list">
                                <li v-for="truck_driver in truck_drivers | orderBy 'position'">
                                    <p>{{truck_driver.first_name+' '+truck_driver.middle_name+' '+truck_driver.last_name}}</p>
                                    <p class="test-data">Time: {{ truck_driver.heat_stats.start_time }} Distance: {{ truck_driver.heat_stats.distance }} Fuel Used: {{ truck_driver.heat_stats.fuel_used }} km/l: {{ truck_driver.heat_stats.kml }} RPM: {{ truck_driver.heat_stats.rpm }} Accelerator: {{ truck_driver.heat_stats.accelerator }}</p>
                                    <div class="left">
                                        <img v-bind:src="truck_driver.image">
                                        <span>Tid:</span>
                                    </div>
                                    <div class="right">
                                        <div class="sections">
                                            <div class="section">{{ (truck_driver.heat_stats.m1_kml) ? truck_driver.heat_stats.m1_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (truck_driver.heat_stats.m2_kml) ? truck_driver.heat_stats.m2_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (truck_driver.heat_stats.m3_kml) ? truck_driver.heat_stats.m3_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (truck_driver.heat_stats.m4_kml) ? truck_driver.heat_stats.m4_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (truck_driver.heat_stats.m5_kml) ? truck_driver.heat_stats.m5_kml+' km/l' : '' }}</div>
                                        </div>
                                        <div class="time">
                                            <span class="progress" data-progress="{{ this.progressSecondsToPercent(truck_driver) }}"></span>
                                            <span class="counter">{{ this.timeSinceInHuman(truck_driver) }}</span>
                                        </div>
                                    </div>
                                    <div class="end">
                                        <span class="total">{{ (truck_driver.heat_stats.kml) ? truck_driver.heat_stats.kml+' km/l' : 'Venter på Start' }}</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="step" data-step="2">
                            <div class="list-indikator">
                                <img src="images/van_2.png">
                                Live Vans
                            </div>
                            <ul class="player-list">
                                <li class="moving-item" v-for="van_driver in van_drivers | orderBy 'position'">
                                    <p>{{van_driver.first_name+' '+van_driver.middle_name+' '+van_driver.last_name}}</p>
                                    <p class="test-data">Time: {{ van_driver.heat_stats.start_time }} Distance: {{ van_driver.heat_stats.distance }} Fuel Used: {{ van_driver.heat_stats.fuel_used }} km/l: {{ van_driver.heat_stats.kml }} RPM: {{ van_driver.heat_stats.rpm }} Accelerator: {{ van_driver.heat_stats.accelerator }}</p>
                                <div class="left">
                                    <img v-bind:src="van_driver.image">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                            <div class="section">{{ (van_driver.heat_stats.m1_kml) ? van_driver.heat_stats.m1_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (van_driver.heat_stats.m2_kml) ? van_driver.heat_stats.m2_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (van_driver.heat_stats.m3_kml) ? van_driver.heat_stats.m3_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (van_driver.heat_stats.m4_kml) ? van_driver.heat_stats.m4_kml+' km/l' : '' }}</div>
                                            <div class="section">{{ (van_driver.heat_stats.m5_kml) ? van_driver.heat_stats.m5_kml+' km/l' : '' }}</div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="{{ this.progressSecondsToPercent(van_driver) }}"></span>
                                        <span class="counter">{{ this.timeSinceInHuman(van_driver) }}</span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">{{ (van_driver.heat_stats.kml) ? van_driver.heat_stats.kml+' km/l' : 'Venter på Start' }}</span>
                                </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="live-trucks">
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="heat-title">Live Data Heat: <span class="heat-number">{{heat.number}}</span></h1>
                        <ul class="truck-list">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="driver-name">{{ truck_1.driver.first_name }} {{ truck_1.driver.middle_name }} {{ truck_1.driver.last_name }}</div>
                                                <img src="/images/truck_2.png" class="player--logo">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="vehicle-info vehicle-name">{{ truck_1.name }}  {{ truck_1.model }}</div>
                                                <div class="vehicle-info vehicle-reg_nr" >{{ truck_1.reg_nr }}</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="gauges">
                                                    <span class="gauge-distance">
                                                        Afstand Kørt:
                                                        <div class="vehicle_gauge_distance">{{ truck_1.driver.heat_stats ? truck_1.driver.heat_stats.distance : 0 }} KM</div>
                                                    </span>
                                                    <span class="gauge-fuel">
                                                        <canvas id="truck_1_gauge_fuel" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_1.driver.heat_stats ? truck_1.driver.heat_stats.fuel_used : 0 }} L</span>
                                                    </span>
                                                    <span class="gauge-kml">
                                                        <canvas id="truck_1_gauge_kml" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_1.driver.heat_stats ? truck_1.driver.heat_stats.kml : 0 }} km/l</span>
                                                    </span>
                                                    <span class="gauge-rpm">
                                                        <canvas id="truck_1_gauge_rpm" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_1.driver.heat_stats ? truck_1.driver.heat_stats.rpm : 0 }} rpm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="driver-name">{{ truck_2.driver.first_name }} {{ truck_2.driver.middle_name }} {{ truck_2.driver.last_name }}</div>
                                                <img src="/images/truck_2.png" class="player--logo">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="vehicle-info vehicle-name">{{ truck_2.name }}  {{ truck_2.model }}</div>
                                                <div class="vehicle-info vehicle-reg_nr" >{{ truck_2.reg_nr }}</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="gauges">
                                                    <span class="gauge-distance">
                                                        Afstand Kørt:
                                                        <div class="vehicle_gauge_distance">{{ truck_2.driver.heat_stats ? truck_2.driver.heat_stats.distance : 0 }} KM</div>
                                                    </span>
                                                    <span class="gauge-fuel">
                                                        <canvas id="truck_2_gauge_fuel" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_2.driver.heat_stats ? truck_2.driver.heat_stats.fuel_used : 0 }} L</span>
                                                    </span>
                                                    <span class="gauge-kml">
                                                        <canvas id="truck_2_gauge_kml" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_2.driver.heat_stats ? truck_2.driver.heat_stats.kml : 0 }} km/l</span>
                                                    </span>
                                                    <span class="gauge-rpm">
                                                        <canvas id="truck_2_gauge_rpm" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ truck_2.driver.heat_stats ? truck_2.driver.heat_stats.rpm : 0 }} rpm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="live-vans">
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="van-list">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="driver-name">{{ van_1.driver.first_name }} {{ van_1.driver.middle_name }} {{ van_1.driver.last_name }}</div>
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="vehicle-info vehicle-name">{{ van_1.name }}  {{ van_1.model }}</div>
                                                <div class="vehicle-info vehicle-reg_nr" >{{ van_1.reg_nr }}</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="gauges">
                                                    <span class="gauge-distance">
                                                        Afstand Kørt:
                                                        <div class="vehicle_gauge_distance">{{ van_1.driver.heat_stats ? van_1.driver.heat_stats.distance : 0 }} KM</div>
                                                    </span>
                                                    <span class="gauge-fuel">
                                                        <canvas id="van_1_gauge_fuel" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_1.driver.heat_stats ? van_1.driver.heat_stats.fuel_used : 0 }} L</span>
                                                    </span>
                                                    <span class="gauge-kml">
                                                        <canvas id="van_1_gauge_kml" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_1.driver.heat_stats ? van_1.driver.heat_stats.kml : 0 }} km/l</span>
                                                    </span>
                                                    <span class="gauge-rpm">
                                                        <canvas id="van_1_gauge_rpm" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_1.driver.heat_stats ? van_1.driver.heat_stats.rpm : 0 }} rpm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="driver-name">{{ van_2.driver.first_name }} {{ van_2.driver.middle_name }} {{ van_2.driver.last_name }}</div>
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="vehicle-info vehicle-name">{{ van_2.name }}  {{ van_2.model }}</div>
                                                <div class="vehicle-info vehicle-reg_nr" >{{ van_2.reg_nr }}</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="gauges">
                                                    <span class="gauge-distance">
                                                        Afstand Kørt:
                                                        <div class="vehicle_gauge_distance">{{ van_2.driver.heat_stats ? van_2.driver.heat_stats.distance : 0 }} KM</div>
                                                    </span>
                                                    <span class="gauge-fuel">
                                                        <canvas id="van_2_gauge_fuel" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_2.driver.heat_stats ? van_2.driver.heat_stats.fuel_used : 0 }} L</span>
                                                    </span>
                                                    <span class="gauge-kml">
                                                        <canvas id="van_2_gauge_kml" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_2.driver.heat_stats ? van_2.driver.heat_stats.kml : 0 }} km/l</span>
                                                    </span>
                                                    <span class="gauge-rpm">
                                                        <canvas id="van_2_gauge_rpm" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_2.driver.heat_stats ? van_2.driver.heat_stats.rpm : 0 }} rpm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="driver-name">{{ van_3.driver.first_name }} {{ van_3.driver.middle_name }} {{ van_3.driver.last_name }}</div>
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="vehicle-info vehicle-name">{{ van_3.name }}  {{ van_3.model }}</div>
                                                <div class="vehicle-info vehicle-reg_nr" >{{ van_3.reg_nr }}</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="gauges">
                                                    <span class="gauge-distance">
                                                        Afstand Kørt:
                                                        <div class="vehicle_gauge_distance">{{ van_3.driver.heat_stats ? van_3.driver.heat_stats.distance : 0 }} KM</div>
                                                    </span>
                                                    <span class="gauge-fuel">
                                                        <canvas id="van_3_gauge_fuel" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_3.driver.heat_stats ? van_3.driver.heat_stats.fuel_used : 0 }} L</span>
                                                    </span>
                                                    <span class="gauge-kml">
                                                        <canvas id="van_3_gauge_kml" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_3.driver.heat_stats ? van_3.driver.heat_stats.kml : 0 }} km/l</span>
                                                    </span>
                                                    <span class="gauge-rpm">
                                                        <canvas id="van_3_gauge_rpm" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                        <span class="vehicle_gauge_text">{{ van_3.driver.heat_stats ? van_3.driver.heat_stats.rpm : 0 }} rpm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style>
    .post-nord-logo {
        filter: brightness(0) invert(1);
        -webkit-filter: brightness(0) invert(1);
    }
    .commotive-logo{
        height: 100px;
        padding: 15px;
        margin-top: -22px;
    }
    h1.heat-title {
        margin: 0;
        padding: 0;
        padding-bottom: 21px;
    }
    .fact-box {
        display: flex;
        background: #0099bb;
        padding: 6px;
    }
    .fact-box span{
        flex-grow: 1;
        text-align: center;
    }
    .test-data {
        display: none;
        position: absolute;
        z-index: 2000;
        left: 52px;
        font-size: 14px !important;
    }
    .truck-list img, .van-list img {
        height: auto;
        width: 100px;
        margin-top: 5px;
        margin-bottom: 7px;
    }
    .player--logo {
        margin-top: 23px;
    }

    .player--name {
        font-weight: 600;
        font-size: 18px;
        margin-left: -50px;
    }

    .bil--info span {
        color: #0099bb;
    }

    .bil--info {
        font-weight: 600;
    }
    .list-group {
        margin-bottom: 0;
    }
    .kmlbox{
        width: 100%;
        padding: 5px;
        margin-left: 15px;
    }
    .kmlbox span{
        background: #0099bb;
        padding: 5px;
        padding-bottom: 10px;
    }
    .truck-list img, .van-list img {
        height: auto;
        width: 100px;
        margin-top: 10px;
        border-bottom: 1px solid #555555;
        margin-left: 14px;
    }
    .driver-name {
        font-size: 20px;
        padding-left: 20px;
        padding-top: 7px;
        margin-bottom: -10px;
    }
    .vehicle-reg_nr {
        display: block !important;
        border: 2px solid rgb(216, 13, 13);
        text-align: center;
        padding: 2px;
        border-radius: 4px;
        background: white;
        color: black;
        font-weight: bold;
        width: 100px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1px;
    }
    .vehicle-name {
        text-align: center;
        padding-top: 9px;
        padding-bottom: 7px;
        font-size: 20px;
    }
    .gauge-distance {
        padding-top: 2px;
    }
    .vehicle_gauge_text {
        margin: 0;
        padding: 0;
        position: absolute !important;
        z-index: 200;
        left: 44%;
        bottom: 0;
    }
    .vehicle_gauge_distance {
        padding-top: 13px;
        font-size: 20px;
    }
    .gauges{
        display: flex;
        padding-top: 7px;
    }
    .gauges span {
        position: relative;
        flex-grow: 1;
        text-align: center;
    }
</style>
<script>
    // 'http://rallyscreen.app:3000'
    // 'http://139.59.177.94:3000'
//      var socket = io('http://rallyscreen.app:3000');
    var socket = io('http://139.59.177.94:3000');
    var test_timer;

export default
{
    props:{
        csrf_token: {}
    },
    data(){
        return{
            heat: {},
            van_drivers: {},
            truck_drivers: {},
            vans: {},
            trucks: {},
            truck_1: { driver:{} },
            truck_2: { driver:{} },
            truck_3: { driver:{} },
            van_1: { driver:{} },
            van_2: { driver:{} },
            van_3: { driver:{} },
            diims_data : [],
            timer_1:{ id : 0, counter : '', live_counter : 0},
            timer_2:{ id : 0, counter : '', live_counter : 0},
            timer_3:{ id : 0, counter : '', live_counter : 0},
            timer_4:{ id : 0, counter : '', live_counter : 0},
            timer_5:{ id : 0, counter : '', live_counter : 0},
            timer_6:{ id : 0, counter : '', live_counter : 0},
            test_started: false,
            test_stopped: false,
            test_running: false
        }
    },
    computed: {
    },
    methods: {
        progressSecondsToPercent(driver)
        {
            var start_time_in_seconds = driver.heat_stats.start_time;
            var stop_time_in_seconds = driver.heat_stats.stop_time;
            var time_passed;
            var progress = 0;

            if(start_time_in_seconds && stop_time_in_seconds)
            {
                time_passed = stop_time_in_seconds - start_time_in_seconds;

                progress = ( time_passed / 1620 ) * 100;

                if(progress > 100){ progress = 100; }
            }
            else if(start_time_in_seconds && !stop_time_in_seconds)
            {
                time_passed = (Date.now() / 1000) - start_time_in_seconds;

                progress = ( time_passed / 1620 ) * 100;

                if(progress > 100){ progress = 100; }
            }
            else{ progress = 0; }

            return progress.toFixed(0);
        },
        timeSinceInHuman(driver)
        {
            var vm = this;
            var start_time_in_seconds = driver.heat_stats.start_time;
            var stop_time_in_seconds = driver.heat_stats.stop_time;
            var time_in_human = "00:00";
            var diff;


            if(start_time_in_seconds && stop_time_in_seconds)
            { // car has a start and stop time
                diff = stop_time_in_seconds - start_time_in_seconds;
                time_in_human = vm.timeToHuman(diff);
            }
            else if(start_time_in_seconds && !stop_time_in_seconds)
            {
                diff = ( Date.now() / 1000 ) - start_time_in_seconds;
                time_in_human = vm.timeToHuman(diff);
            }

            if(start_time_in_seconds == null && stop_time_in_seconds == null)
            {
                time_in_human = "00:00"
            }

            return time_in_human;
        },
        timeToHuman: function(time_in_seconds)
        {
            var seconds = Math.floor(time_in_seconds % 60);
            var minutes = Math.floor(time_in_seconds / 60);
            if(seconds < 10)
            {
                seconds = "0"+seconds;
            }
            if(minutes < 10)
            {
                minutes = "0"+minutes;
            }
            return minutes+':'+seconds;
        },
        changeOrder: function (order) {
            var vm = this;
            var array = [];

            if (order == 1 || order == 2 || order == 3)
            {
                array = vm.$get('van_drivers');
            }
            if (order == 4 || order == 5 || order == 6)
            {
                array = vm.$get('truck_drivers');
            }

            var array_m0 = [];
            var array_m1 = [];
            var array_m2 = [];
            var array_m3 = [];
            var array_m4 = [];
            var array_m5 = [];

            array.forEach(function(element,index,array){
                var heat_stats = element.heat_stats;

                var is_m5 = heat_stats.m5_kml ? heat_stats.m5_kml : false;
                var is_m4 = heat_stats.m4_kml && !heat_stats.m5_kml ? heat_stats.m4_kml : false;
                var is_m3 = heat_stats.m3_kml && (!heat_stats.m5_kml && !heat_stats.m4_kml) ? heat_stats.m3_kml : false;
                var is_m2 = heat_stats.m2_kml && (!heat_stats.m5_kml && !heat_stats.m4_kml && !heat_stats.m3_kml) ? heat_stats.m2_kml : false;
                var is_m1 = heat_stats.m1_kml && (!heat_stats.m5_kml && !heat_stats.m4_kml && !heat_stats.m3_kml && !heat_stats.m2_kml) ? heat_stats.m1_kml : false;

                if(is_m5){ array_m5.push(element); }
                else if(is_m4){ array_m4.push(element); }
                else if(is_m3){ array_m3.push(element); }
                else if(is_m2){ array_m2.push(element); }
                else if(is_m1){ array_m1.push(element); }
                else{ array_m0.push(element); }

            });

            var sort_m1 = array_m1.slice().sort(function(driver_1, driver_2){
                var kml_1 = driver_1.heat_stats.m1_kml ? parseInt(driver_1.heat_stats.m1_kml) : 0;
                var kml_2 = driver_2.heat_stats.m1_kml ? parseInt(driver_2.heat_stats.m1_kml) : 0;
                var result;
                if (kml_1 < kml_2) { result = 1 }
                else if (kml_1 > kml_2) { result = -1 }
                else { result = 0 }
                return result;
            });
            var sort_m2 = array_m2.slice().sort(function(driver_1, driver_2){
                var kml_1 = driver_1.heat_stats.m2_kml ? parseInt(driver_1.heat_stats.m2_kml) : 0;
                var kml_2 = driver_2.heat_stats.m2_kml ? parseInt(driver_2.heat_stats.m2_kml) : 0;
                var result;
                if (kml_1 < kml_2) { result = 1 }
                else if (kml_1 > kml_2) { result = -1 }
                else { result = 0 }
                return result;
            });
            var sort_m3 = array_m3.slice().sort(function(driver_1, driver_2){
                var kml_1 = driver_1.heat_stats.m3_kml ? parseInt(driver_1.heat_stats.m3_kml) : 0;
                var kml_2 = driver_2.heat_stats.m3_kml ? parseInt(driver_2.heat_stats.m3_kml) : 0;
                var result;
                if (kml_1 < kml_2) { result = 1 }
                else if (kml_1 > kml_2) { result = -1 }
                else { result = 0 }
                return result;
            });
            var sort_m4 = array_m4.slice().sort(function(driver_1, driver_2){
                var kml_1 = driver_1.heat_stats.m4_kml ? parseInt(driver_1.heat_stats.m4_kml) : 0;
                var kml_2 = driver_2.heat_stats.m4_kml ? parseInt(driver_2.heat_stats.m4_kml) : 0;
                var result;
                if (kml_1 < kml_2) { result = 1 }
                else if (kml_1 > kml_2) { result = -1 }
                else { result = 0 }
                return result;
            });
            var sort_m5 = array_m5.slice().sort(function(driver_1, driver_2){
                var kml_1 = driver_1.heat_stats.m5_kml ? parseInt(driver_1.heat_stats.m5_kml) : 0;
                var kml_2 = driver_2.heat_stats.m5_kml ? parseInt(driver_2.heat_stats.m5_kml) : 0;
                var result;
                if (kml_1 < kml_2) { result = 1 }
                else if (kml_1 > kml_2) { result = -1 }
                else { result = 0 }
                return result;
            });

            var sorted_array = [];
            sort_m1.forEach(function(element,index,array){
                sorted_array.push(element);
            });
            sort_m2.forEach(function(element,index,array){
                sorted_array.push(element);
            });
            sort_m3.forEach(function(element,index,array){
                sorted_array.push(element);
            });
            sort_m4.forEach(function(element,index,array){
                sorted_array.push(element);
            });
            sort_m5.forEach(function(element,index,array){
                sorted_array.push(element);
            });

            sorted_array.forEach(function (item, index) {
                item.position = index;
            });
        },
        sortDrivers: function(){
            var vm = this;
            vm.changeOrder(1);
            vm.changeOrder(4);
        },
        getHeatData(heat_id)
        {
            var vm = this;
            if(!heat_id){
                heat_id = null;
            }
            var data = {
                heat_id : heat_id,
                _token : vm.csrf_token
            };
            vm.$http.post('/api/livescore/',data)
                .then( function(response)
                {
                    var data = JSON.parse(response.data);
                    vm.$set('heat',data.heat);
                    vm.$set('van_drivers',data.van_drivers);
                    vm.$set('truck_drivers',data.truck_drivers);

                    vm.$set('trucks',data.trucks);
                    vm.$set('vans',data.vans);

                    vm.initializeVehicles();

                    return true;
                }, function (response){
                    console.log(response);
                });
        },
        initializeVehicles()
        {
            var vm = this;
            var data = [];
            var driver_data;
            if(vm.heat.van_1)
            {
                driver_data = {
                    vehicle_id : vm.heat.van_1.vehicle_id,
                    driver_id : vm.heat.van_1.driver_id,
                    heat_id : vm.heat.id,
                    order : 1

                };
                data.push(driver_data);
            }
            if(vm.heat.van_2)
            {
                driver_data = {
                    vehicle_id : vm.heat.van_2.vehicle_id,
                    driver_id : vm.heat.van_2.driver_id,
                    heat_id : vm.heat.id,
                    order : 2
                };
                data.push(driver_data);
            }
            if(vm.heat.van_3)
            {
                driver_data = {
                    vehicle_id : vm.heat.van_3.vehicle_id,
                    driver_id : vm.heat.van_3.driver_id,
                    heat_id : vm.heat.id,
                    order : 3
                };
                data.push(driver_data);
            }
            if(vm.heat.truck_1)
            {
                driver_data = {
                    vehicle_id : vm.heat.truck_1.vehicle_id,
                    driver_id : vm.heat.truck_1.driver_id,
                    heat_id : vm.heat.id,
                    order : 4
                };
                data.push(driver_data);
            }
            if(vm.heat.truck_2)
            {
                driver_data = {
                    vehicle_id : vm.heat.truck_2.vehicle_id,
                    driver_id : vm.heat.truck_2.driver_id,
                    heat_id : vm.heat.id,
                    order : 5
                };
                data.push(driver_data);
            }

            data = {
                data : data,
                _token : vm.csrf_token
            };

            vm.$http.post('/api/livescore/bundleGetLiveVehicle', data)
                    .then(function(response){
                        var result = JSON.parse(response.data);
                        result.forEach(function(element,index,array){
                            element.vehicle.diims_data = [];

                            if(element.order == 1)
                            {
                                vm.$set('van_1',element.vehicle);
                            }
                            if(element.order == 2)
                            {
                                vm.$set('van_2',element.vehicle);
                            }
                            if(element.order == 3)
                            {
                                vm.$set('van_3',element.vehicle);
                            }
                            if(element.order == 4)
                            {
                                vm.$set('truck_1',element.vehicle);
                            }
                            if(element.order == 5)
                            {
                                vm.$set('truck_2',element.vehicle);
                            }

                            if(element.heat_stats.active)
                            {
                                vm.startDriverLoop(element.data);
                            }
                        });

                    });
        },
        changeHeat(heat_id)
        {
            var vm = this;
            vm.stopAllTimers();
            vm.getHeatData(heat_id);
        },
        stopAllTimers()
        {
            var vm = this;
            for (var i = 1; i != 6; i++) {
                clearInterval(vm.$get('timer_'+i+'.id'));
                clearInterval(vm.$get('timer_'+i+'.live_counter'));
            }
        },
        setActiveDrivers(data)
        {
            console.log(data);
            var vm = this;
            data._token = vm.csrf_token;
            order = data.order;
            this.$http
                .post('/api/livescore/getLiveVehicle/',data)
                .then( function(response) {
                    var result = JSON.parse(response.data);

                    result.vehicle.diims_data = [];
                    if(order == 1){ vm.$set('van_1',result.vehicle); }
                    if(order == 2){ vm.$set('van_2',result.vehicle); }
                    if(order == 3){ vm.$set('van_3',result.vehicle); }
                    if(order == 4){ vm.$set('truck_1',result.vehicle); }
                    if(order == 5){ vm.$set('truck_2',result.vehicle); }
                });
        },
        updateTime(driver)
        {
            driver.heat_stats.start_time = driver.heat_stats.start_time - 0.000001
        },
        startDriverLoop(data)
        {
            var vm = this;
            console.log(data);
            var driver = vm.getDriver(data.driver_id);
            console.log(driver);
            console.log('Starting: '+driver.first_name);
            var diims_id;
            var timer = {};
            data._token = vm.csrf_token;

            if(data.order == 1){ diims_id = vm.$get('van_1.diims_id'); }
            if(data.order == 2){ diims_id = vm.$get('van_2.diims_id'); }
            if(data.order == 3){ diims_id = vm.$get('van_3.diims_id'); }
            if(data.order == 4){ diims_id = vm.$get('truck_1.diims_id'); }
            if(data.order == 5){ diims_id = vm.$get('truck_2.diims_id'); }

            vm.getDiimsData(diims_id, data.order, data);
            timer.id = setInterval(function(){ vm.getDiimsData(diims_id, data.order, data); },10000);
            timer.counter = 0;
            vm.$set('timer_'+data.order, timer);
        },
        stopDriverLoop(data)
        {
            var vm = this;
            var driver = vm.getDriver(data.driver_id);
            console.log(data);
            console.log(driver);
//            console.log('Stopping: '+driver.first_name);

            clearInterval(vm.$get('timer_'+data.order+'.id'));
            clearInterval(vm.$get('timer_'+data.order+'.live_counter'));

            driver.heat_stats.stop_time = Date.now() / 1000;

            var time_data = {
                '_token' : vm.csrf_token,
                'heat_id' : vm.heat.id,
                'driver_id' : driver.id,
                'vehicle_id' : data.vehicle_id,
                'stop_time' : driver.heat_stats.stop_time
            };

            vm.$http.post('/api/livescore/updateStopTime/',time_data)
                .then( function(response) {
//                    console.log('Updating Stop Time');
                });
        },
        getDriver(id)
        {
            console.log(id);
            var vm = this;
            for (var i = 0; i < vm.van_drivers.length; i++) {
                if(vm.van_drivers[i].id == id)
                {
                    return vm.$get('van_drivers['+i+']');
                }
            }
            for (var i = 0; i < vm.truck_drivers.length; i++) {
                if(vm.truck_drivers[i].id == id)
                {
                    return vm.$get('truck_drivers['+i+']');
                }
            }
        },
        getDiimsData(diims_id,order, data)
        {
            var vm = this;
            var driver = vm.getDriver(data.driver_id);
            var vehicle_id = data.vehicle_id;
            $.ajax({
                type: "POST",
                url: 'http://eco.commotive.dk/WebService.asmx/GetLatestData',
                contentType: "application/json; charset=utf-8",
                crossDomain: true,
                data: JSON.stringify({ DeviceId: diims_id }),
                dataType: "json",
                success: function (data)
                {
                    var result = JSON.parse(data.d);

                    var reportType = result[0].ReportType;
                    var ignitionKey = result[0].IgnitionKey;

                    var vehicle_is_started = reportType == 11;
                    var vehicle_is_stopped = reportType == 10;
                    var vehicle_is_running = reportType == 0;
//                    var vehicle_is_started = vm.test_started;
//                    var vehicle_is_stopped = vm.test_stopped;
//                    var vehicle_is_running = vm.test_running;

//                    console.log('Started: '+vehicle_is_started);
//                    console.log('Stopped: '+vehicle_is_stopped);
//                    console.log('Running: '+vehicle_is_running);
//                    console.log('::::::::::NEW DATA LINE::::::::::');

                    if(vehicle_is_started)
                    {
                        console.log('Vehicle is Started:');
//                        console.log('start_time_check: '+driver.heat_stats.start_time);
                        if(!driver.heat_stats.start_time)
                        {
                            driver.heat_stats.start_time = Date.now() / 1000;
//                            console.log('Start_time not set, Time: '+driver.heat_stats.start_time);
                            var time_data = {
                                '_token' : vm.csrf_token,
                                'heat_id' : vm.heat.id,
                                'driver_id' : driver.id,
                                'vehicle_id' : vehicle_id,
                                'start_time' : driver.heat_stats.start_time
                            };
                            vm.$http.post('/api/livescore/updateStartTime/',time_data)
                                .then( function(response) {
//                                    console.log('Updating Start Time');
                                });
                        }

                        var is_timer_running = vm.$get('timer_'+order+'.live_counter');

//                        console.log('is_timer_running: '+is_timer_running);
                        if(!is_timer_running)
                        {
//                            console.log('Start_Timer not Running, starting timer!');
                            var timer_id = setInterval(function(){ vm.updateTime(driver) },1000);
                            vm.$set('timer_'+order+'.live_counter', timer_id );
                        }
                        var marker = vm.updateVehicleDiimsData(order, result[0]);
                        vm.updateHeatStats(order);
                        vm.updateMap(marker);
                    }

                    if(vehicle_is_stopped)
                    {
                        console.log('Vehicle is Stopped');
                        var diff = driver.heat_stats.stop_time - driver.heat_stats.start_time;
                        if(diff <= 1800)
                        {
                            // race still going
                        }
                        if(diff >= 1800)
                        {
                            // finished race
                            console.log('else');
                        }
                    }

                    if(vehicle_is_running)
                    {
                        console.log('Vehicle is Running');
                        var marker = vm.updateVehicleDiimsData(order, result[0]);
                        vm.updateHeatStats(order);
                        vm.updateMap(marker);
                    }
                }
            });
        },
        updateVehicleDiimsData(order, diims_data)
        {
            var vm = this;
            var marker;
            if(order == 1)
            {
                vm.van_1.diims_data.push(diims_data);
                marker = "van_1";
            }
            if(order == 2)
            {
                vm.van_2.diims_data.push(diims_data);
                marker = "van_2";
            }
            if(order == 3)
            {
                vm.van_3.diims_data.push(diims_data);
                marker = "van_3";
            }
            if(order == 4)
            {
                vm.truck_1.diims_data.push(diims_data);
                marker = "truck_1";
            }
            if(order == 5)
            {
                vm.truck_2.diims_data.push(diims_data);
                marker = "truck_2";
            }
            return marker;
        },
        updateHeatStats(order)
        {
            var vm = this;
            var array_1;
            var length;
            var array_2;
            var data;

            if(order == 1) {
                array_1 = vm.van_1.diims_data[0]; length = vm.van_1.diims_data.length - 1; array_2 = vm.van_1.diims_data[length];
                data = { vehicle_id : vm.van_1.id, driver_id : vm.van_1.driver.id, heat_id : vm.heat.id };
            }
            if(order == 2) {
                array_1 = vm.van_2.diims_data[0]; length = vm.van_2.diims_data.length - 1; array_2 = vm.van_2.diims_data[length];
                data = { vehicle_id : vm.van_2.id, driver_id : vm.van_2.driver.id, heat_id : vm.heat.id };
            }
            if(order == 3) {
                array_1 = vm.van_3.diims_data[0]; length = vm.van_3.diims_data.length - 1; array_2 = vm.van_3.diims_data[length];
                data = { vehicle_id : vm.van_3.id, driver_id : vm.van_3.driver.id, heat_id : vm.heat.id };
            }
            if(order == 4) {
                array_1 = vm.truck_1.diims_data[0]; length = vm.truck_1.diims_data.length - 1; array_2 = vm.truck_1.diims_data[length];
                data = { vehicle_id : vm.truck_1.id, driver_id : vm.truck_1.driver.id, heat_id : vm.heat.id };
            }
            if(order == 5) {
                array_1 = vm.truck_2.diims_data[0]; length = vm.truck_2.diims_data.length - 1; array_2 = vm.truck_2.diims_data[length];
                data = { vehicle_id : vm.truck_2.id, driver_id : vm.truck_2.driver.id, heat_id : vm.heat.id };
            }
            if(order == 6) {
                array_1 = vm.truck_3.diims_data[0]; length = vm.truck_3.diims_data.length - 1; array_2 = vm.truck_3.diims_data[length];
                data = { vehicle_id : vm.truck_3.id, driver_id : vm.truck_3.driver.id, heat_id : vm.heat.id };
            }

            var diims_1_Odometer = array_1.Odometer / 10;
            var diims_2_Odometer = array_2.Odometer / 10;
//            console.log('Diims_1_odo: '+diims_1_Odometer);
//            console.log('Diims_2_odo: '+diims_2_Odometer);

            var diims_1_TotalFuelUsed = array_1.TotalFuelUsed / 100;
            var diims_2_TotalFuelUsed = array_2.TotalFuelUsed / 100;
//            console.log('Diims_1_fuel: '+diims_1_TotalFuelUsed);
//            console.log('Diims_2_fuel: '+diims_2_TotalFuelUsed);

            var distance_driven_in_km = diims_2_Odometer - diims_1_Odometer; // KM siden sidste opdatering
            var litres_of_fuel_used = diims_2_TotalFuelUsed - diims_1_TotalFuelUsed; // L brugt siden sidste opdatering

//            console.log('distance in km: '+distance_driven_in_km);
//            console.log('Fuel used in Litres: '+litres_of_fuel_used);

            var kml = 0;
            if( distance_driven_in_km != 0 || litres_of_fuel_used != 0)
            {
                kml = distance_driven_in_km / litres_of_fuel_used;
            }

            data.kml = parseFloat(kml).toFixed(1);
            data.distance = parseFloat(distance_driven_in_km).toFixed(2);
            data.fuel_used = parseFloat(litres_of_fuel_used).toFixed(2);
            data.accelerator = array_2.Accelerator;
            data.rpm = array_2.RPM;
            data._token = vm.csrf_token;
            data.m1_kml = null;
            data.m2_kml = null;
            data.m3_kml = null;
            data.m4_kml = null;
            data.m5_kml = null;
            if(data.kml == Infinity) { data.kml = 0.00; }

            var driver = vm.getDriver(data.driver_id);
            driver.heat_stats.kml = data.kml;
            driver.heat_stats.distance = data.distance;
            driver.heat_stats.fuel_used = data.fuel_used;
            driver.heat_stats.accelerator = data.accelerator;
            driver.heat_stats.rpm = data.rpm;
            driver.heat_stats.distance = parseFloat(data.distance).toFixed(1);

            var time_passed = (Date.now() / 1000) - driver.heat_stats.start_time;

//            console.log('Time Passed: '+time_passed);
            if(time_passed > 300 && time_passed < 315)
            {
                driver.heat_stats.m1_kml = data.kml;
                data.milestone = 1;
                vm.$http
                  .post('/api/livescore/updateMilestone', data)
                  .then(function(response){
                });
            }
            else if(time_passed > 600 && time_passed < 615)
            {
                driver.heat_stats.m2_kml = data.kml;
                data.milestone = 2;
                vm.$http
                  .post('/api/livescore/updateMilestone', data)
                  .then(function(response){
                });
            }
            else if(time_passed > 900 && time_passed < 915)
            {
                driver.heat_stats.m3_kml = data.kml;
                data.milestone = 3;
                vm.$http
                  .post('/api/livescore/updateMilestone', data)
                  .then(function(response){
                });
            }
            else if(time_passed > 1200 && time_passed < 1215)
            {
                driver.heat_stats.m4_kml = data.kml;
                data.milestone = 4;
                vm.$http
                  .post('/api/livescore/updateMilestone', data)
                  .then(function(response){
                });
            }
            else if(time_passed > 1500)
            {
                driver.heat_stats.m5_kml = data.kml;
                data.milestone = 5;
                vm.$http
                  .post('/api/livescore/updateMilestone', data)
                  .then(function(response){
                });
            }


            if(order == 1)
            {
                vm.$set('van_1.driver', driver);
                fuel_gauges[2].set(driver.heat_stats.fuel_used);
                kml_gauges[2].set(driver.heat_stats.kml);
                rpm_gauges[2].set(driver.heat_stats.rpm);
            }
            if(order == 2)
            {
                vm.$set('van_2.driver', driver);
                fuel_gauges[3].set(driver.heat_stats.fuel_used);
                kml_gauges[3].set(driver.heat_stats.kml);
                rpm_gauges[3].set(driver.heat_stats.rpm);
            }
            if(order == 3)
            {
                vm.$set('van_3.driver', driver);
                fuel_gauges[4].set(driver.heat_stats.fuel_used);
                kml_gauges[4].set(driver.heat_stats.kml);
                rpm_gauges[4].set(driver.heat_stats.rpm);
            }
            if(order == 4)
            {
                vm.$set('truck_1.driver', driver);
                console.log(vm.$get('truck_1.driver'));
                fuel_gauges[0].set(driver.heat_stats.fuel_used);
                kml_gauges[0].set(driver.heat_stats.kml);
                rpm_gauges[0].set(driver.heat_stats.rpm);

            }
            if(order == 5)
            {
                vm.$set('truck_2.driver', driver);
                fuel_gauges[1].set(driver.heat_stats.fuel_used);
                kml_gauges[1].set(driver.heat_stats.kml);
                rpm_gauges[1].set(driver.heat_stats.rpm);
            }

            this.$http
                .post('/api/livescore/updateHeatStats/',data)
                .then( function(response) {
                });
        },
        updateMap(marker)
        {
            var vm = this;
            var diims_data  = vm.$get(marker+'.diims_data');
            var data = {
                marker : marker,
                diims_data : diims_data[diims_data.length - 1]
            };
            socket.emit('update_map',data);
        },
        webSocketListeners()
        {
            var vm = this;
            socket.on('livescore_check_connection', function(){
                socket.emit('livescore_is_connected','1');
            });
            socket.on('change_heat', function(data){
                vm.changeHeat(data);
            });
            socket.on('driver_update', function(data){
                vm.setActiveDrivers(data);
            });
            socket.on('livescore_stop_timers', function(data){
                vm.stopAllTimers();
            });
            socket.on('setOnLivescore',function(data)
            {
                data._token = vm.csrf_token;
                vm.$http.post('/api/livescore/addDriver',data);
                vm.setActiveDrivers(data);
            });
            socket.on('startTimerOnLivescore',function(data)
            {
                data._token = vm.csrf_token;
                vm.$http.post('/api/livescore/setActiveHeatStatsDriver', data);
                vm.startDriverLoop(data);
            });
            socket.on('stopTimerOnLivescore',function(data)
            {
                data._token = vm.csrf_token;
                vm.$http.post('/api/livescore/setActiveHeatStatsDriver', data);
                vm.stopDriverLoop(data);
            });
        },
        changeStep()
        {
            $('[data-step="'+currentStep+'"]').addClass('slideout');
            setTimeout(function() {
                $('[data-step="'+currentStep+'"]').removeClass('slidein slideout');

                if(currentStep == 2) {
                    currentStep = 1;
                } else {
                    currentStep++;
                }
                $('[data-step="'+currentStep+'"]').addClass('slidein');
            }, 500);
            this.sortDrivers();
        }
    },
    created(){
    },
    ready(){
        var vm = this;
        vm.webSocketListeners();
        vm.getHeatData();

        child = 1;
        currentStep = 1;

//        var stepChanger = setInterval(this.changeStep, 10000); // 10 seconds switch left hand side

        var acc = {
            lines: 12, // The number of lines to draw
            angle: 0.15, // The length of each line
            lineWidth: 0.44, // The line thickness
            pointer: {
            length: 0.9, // The radius of the inner circle
            strokeWidth: 0.035, // The rotation offset
            color: '#000000' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#8FC0DA',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
        };
        var RPM = {
            lines: 12, // The number of lines to draw
            angle: 0.15, // The length of each line
            lineWidth: 0.44, // The line thickness
            pointer: {
            length: 0.9, // The radius of the inner circle
            strokeWidth: 0.035, // The rotation offset
            color: '#000000' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#ec5046',   // Colors
            colorStop: '#ec5046',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
        };

        fuel_gauges = [];
        kml_gauges = [];
        rpm_gauges = [];

        target_fuel = [];
        target_kml = [];
        target_rpm = [];

        target_fuel.push($('#truck_1_gauge_fuel')[0]);
        target_kml.push($('#truck_1_gauge_kml')[0]);
        target_rpm.push($('#truck_1_gauge_rpm')[0]);

        target_fuel.push($('#truck_2_gauge_fuel')[0]);
        target_kml.push($('#truck_2_gauge_kml')[0]);
        target_rpm.push($('#truck_2_gauge_rpm')[0]);

        target_fuel.push($('#van_1_gauge_fuel')[0]);
        target_kml.push($('#van_1_gauge_kml')[0]);
        target_rpm.push($('#van_1_gauge_rpm')[0]);

        target_fuel.push($('#van_2_gauge_fuel')[0]);
        target_kml.push($('#van_2_gauge_kml')[0]);
        target_rpm.push($('#van_2_gauge_rpm')[0]);

        target_fuel.push($('#van_3_gauge_fuel')[0]);
        target_kml.push($('#van_3_gauge_kml')[0]);
        target_rpm.push($('#van_3_gauge_rpm')[0]);

        for (var i = 0; i < target_fuel.length; i++)
        {
            fuel_gauges.push(new Gauge(target_fuel[i]).setOptions(acc));

            fuel_gauges[i].maxValue = 100;
            fuel_gauges[i].animationSpeed = 32;
            fuel_gauges[i].set(0);
        }
        for (var i = 0; i < target_kml.length; i++)
        {
            kml_gauges.push(new Gauge(target_kml[i]).setOptions(acc));

            kml_gauges[i].maxValue = 100;
            kml_gauges[i].animationSpeed = 32;
            kml_gauges[i].set(0);
        }
        for (var i = 0; i < target_rpm.length; i++)
        {
            rpm_gauges.push(new Gauge(target_rpm[i]).setOptions(RPM));

            rpm_gauges[i].maxValue = 5000;
            rpm_gauges[i].animationSpeed = 32;
            rpm_gauges[i].set(0);
        }

    }
}
</script>


<!--<div class="speed-o-meter">-->
    <!--<canvas id="truck_speedometer{{truck.id}}" height="20px" width="50px"></canvas>-->
    <!--<canvas id="truck_rpm{{truck.id}}" height="20px" width="50px"></canvas>-->
<!--</div>-->