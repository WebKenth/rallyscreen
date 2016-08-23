<template>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <div class="logo">
                        <img src="/images/postnordlogo.png">
                    </div>
                </div>
                <div class="col-xs-6 text-right">
                    Heat: <span class="heat-number">{{heat.number}}</span>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="changeStep" class="btn btn-default">Switch</button>
                <!--<button @click="test_started = !test_started" class="btn btn-success">Start | {{test_started}}</button>-->
                <!--<button @click="test_running = !test_running" class="btn btn-info">Running | {{test_running}}</button>-->
                <!--<button @click="test_stopped = !test_stopped" class="btn btn-danger">Stop | {{test_stopped}}</button>-->
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
                                <li v-for="truck_driver in truck_drivers">
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
                                            <span class="progress" data-progress="{{ this.progressSecondsToPercent(truck_driver.heat_stats.start_time) }}"></span>
                                            <span class="counter">{{ this.timeSinceInHuman(truck_driver.heat_stats.start_time) }}</span>
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
                                <li v-for="van_driver in van_drivers">
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
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter">{{ this.timeSinceInHuman(van_driver.heat_stats.start_time) }}</span>
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
                        <ul class="truck-list">
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/truck_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox">
                                                    <span class="total">
                                                        {{ (truck_1.driver.heat_stats) ? truck_1.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (truck_1.driver) ? truck_1.driver.first_name : '' }}
                                                {{ (truck_1.driver) ? truck_1.driver.middle_name : '' }}
                                                {{ (truck_1.driver) ? truck_1.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <canvas id="truck_speedometer_1" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_1.driver.heat_stats) ? 'ACC: '+truck_1.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="truck_rpm_1" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_1.driver.heat_stats) ? 'RPM: '+truck_1.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info">
                                            <li><span>Køretøj: </span>{{ truck_1.name }}</li>
                                            <li><span>Mærke: </span>{{ truck_1.brand }}</li>
                                            <li><span>Model: </span>{{ truck_1.model }}</li>
                                            <li><span>Regnr: </span>{{ truck_1.reg_nr }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/truck_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox" v-show="truck_2.driver.heat_stats">
                                                    <span class="total">
                                                        {{ (truck_2.driver.heat_stats) ? truck_2.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (truck_2.driver) ? truck_2.driver.first_name : '' }}
                                                {{ (truck_2.driver) ? truck_2.driver.middle_name : '' }}
                                                {{ (truck_2.driver) ? truck_2.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row" v-show="truck_2.driver.heat_stats">
                                            <div class="col-md-6">
                                                <canvas id="truck_speedometer_2" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_2.driver.heat_stats) ? 'ACC: '+truck_2.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="truck_rpm_2" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_2.driver.heat_stats) ? 'RPM: '+truck_2.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info" v-show="truck_2.driver.heat_stats">
                                            <li><span>Køretøj: </span>{{ truck_2.name }}</li>
                                            <li><span>Mærke: </span>{{ truck_2.brand }}</li>
                                            <li><span>Model: </span>{{ truck_2.model }}</li>
                                            <li><span>Regnr: </span>{{ truck_2.reg_nr }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/truck_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox" v-show="truck_3.driver.heat_stats">
                                                    <span class="total">
                                                        {{ (truck_3.driver.heat_stats) ? truck_3.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (truck_3.driver) ? truck_3.driver.first_name : '' }}
                                                {{ (truck_3.driver) ? truck_3.driver.middle_name : '' }}
                                                {{ (truck_3.driver) ? truck_3.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row" v-show="truck_3.driver.heat_stats">
                                            <div class="col-md-6">
                                                <canvas id="truck_speedometer_3" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_3.driver.heat_stats) ? 'ACC: '+truck_3.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="truck_rpm_3" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (truck_3.driver.heat_stats) ? 'RPM: '+truck_3.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info" v-show="truck_3.driver.heat_stats">
                                            <li><span>Køretøj: </span>{{ truck_3.name }}</li>
                                            <li><span>Mærke: </span>{{ truck_3.brand }}</li>
                                            <li><span>Model: </span>{{ truck_3.model }}</li>
                                            <li><span>Regnr: </span>{{ truck_3.reg_nr }}</li>
                                        </ul>
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
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox" v-show="van_1.driver.heat_stats">
                                                    <span class="total">
                                                        {{ (van_1.driver.heat_stats) ? van_1.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (van_1.driver) ? van_1.driver.first_name : '' }}
                                                {{ (van_1.driver) ? van_1.driver.middle_name : '' }}
                                                {{ (van_1.driver) ? van_1.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row" v-show="van_1.driver.heat_stats">
                                            <div class="col-md-6">
                                                <canvas id="van_speedometer_1" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_1.driver.heat_stats) ? 'ACC: '+van_1.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="van_rpm_1" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_1.driver.heat_stats) ? 'RPM: '+van_1.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info" v-show="van_1.driver.heat_stats">
                                            <li><span>Køretøj: </span>{{ van_1.name }}</li>
                                            <li><span>Mærke: </span>{{ van_1.brand }}</li>
                                            <li><span>Model: </span>{{ van_1.model }}</li>
                                            <li><span>Regnr: </span>{{ van_1.reg_nr }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox" v-show="van_2.driver.heat_stats">
                                                    <span class="total">
                                                        {{ (van_2.driver.heat_stats) ? van_2.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (van_2.driver) ? van_2.driver.first_name : '' }}
                                                {{ (van_2.driver) ? van_2.driver.middle_name : '' }}
                                                {{ (van_2.driver) ? van_2.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row" v-show="van_2.driver.heat_stats">
                                            <div class="col-md-6">
                                                <canvas id="van_speedometer_2" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_2.driver.heat_stats) ? 'ACC: '+van_2.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="van_rpm_2" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_2.driver.heat_stats) ? 'RPM: '+van_2.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info" v-show="van_2.driver.heat_stats">
                                            <li><span>Køretøj: </span>{{ van_2.name }}</li>
                                            <li><span>Mærke: </span>{{ van_2.brand }}</li>
                                            <li><span>Model: </span>{{ van_2.model }}</li>
                                            <li><span>Regnr: </span>{{ van_2.reg_nr }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="/images/van_2.png" class="player--logo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="kmlbox" v-show="van_3.driver.heat_stats">
                                                    <span class="total">
                                                        {{ (van_3.driver.heat_stats) ? van_3.driver.heat_stats.kml+' km/l' : '0 km/l' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <p class="player--name">
                                                {{ (van_3.driver) ? van_3.driver.first_name : '' }}
                                                {{ (van_3.driver) ? van_3.driver.middle_name : '' }}
                                                {{ (van_3.driver) ? van_3.driver.last_name : '' }}
                                            </p>
                                        </div>
                                        <div class="row" v-show="van_3.driver.heat_stats">
                                            <div class="col-md-6">
                                                <canvas id="van_speedometer_3" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_3.driver.heat_stats) ? 'ACC: '+van_3.driver.heat_stats.accelerator : '' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="van_rpm_3" class="vehicle_gauge" height="50px" width="100%"></canvas>
                                                <p class="vehicle_gauge_text">{{ (van_3.driver.heat_stats) ? 'RPM: '+van_3.driver.heat_stats.rpm : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-unstyled bil--info" v-show="van_3.driver.heat_stats">
                                            <li><span>Køretøj: </span>{{ van_3.name }}</li>
                                            <li><span>Mærke: </span>{{ van_3.brand }}</li>
                                            <li><span>Model: </span>{{ van_3.model }}</li>
                                            <li><span>Regnr: </span>{{ van_3.reg_nr }}</li>
                                        </ul>
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
    .test-data {
        position: absolute;
        z-index: 2000;
        left: 52px;
        font-size: 14px !important;
    }
    .vehicle_gauge{
        height: 50px;
        width: auto;
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
        progressSecondsToPercent(start_time_in_seconds)
        {
            var time_passed = (Date.now() / 1000) - start_time_in_seconds;
            var progress = ( time_passed / 1620 ) * 100;
            return progress.toFixed(0);
        },
        timeSinceInHuman(start_time_in_seconds)
        {
            var time_in_human = '00:00';
            if(start_time_in_seconds != 0 && start_time_in_seconds != null)
            {
                var diff = ( Date.now() / 1000 ) - start_time_in_seconds;
                var seconds = Math.floor(diff % 60);
                var minutes = Math.floor(diff / 60);
                if(seconds < 10)
                {
                    seconds = "0"+seconds;
                }
                if(minutes < 10)
                {
                    minutes = "0"+minutes;
                }
                time_in_human = minutes+':'+seconds;
            }
            return time_in_human;
        },
        getHeatData(heat_id){
            this.$http.get('/api/livescore/'+heat_id)
                .then( function(response)
                {
                    var data = JSON.parse(response.data);
                    this.$set('heat',data.heat);
                    this.$set('van_drivers',data.van_drivers);
                    this.$set('truck_drivers',data.truck_drivers);

                    this.$set('trucks',data.trucks);
                    this.$set('vans',data.vans);

                    return true;
                }, function (response){
                    console.log(response);
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
            vm.stopDriverLoop(1);
            vm.stopDriverLoop(2);
            vm.stopDriverLoop(3);
            vm.stopDriverLoop(4);
            vm.stopDriverLoop(5);
            vm.stopDriverLoop(6);
        },
        setActiveDrivers(data)
        {
            var vm = this;
            data._token = this.csrf_token;
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
                    if(order == 6){ vm.$set('truck_3',result.vehicle); }
                    vm.startDriverLoop(result.vehicle, order, data);
                });
        },
        updateTime(driver)
        {
            driver.heat_stats.start_time = driver.heat_stats.start_time - 0.000001
        },
        startDriverLoop(vehicle, order, data)
        {
            var vm = this;
            var timer = {};

            vm.getDiimsData(vehicle.diims_id, order, data);
            timer.id = setInterval(function(){ vm.getDiimsData(vehicle.diims_id, order, data); },10000);
            timer.counter = 0;
            vm.$set('timer_'+order, timer);

        },
        stopDriverLoop(order)
        {
            var vm = this;
            clearInterval(vm.$get('timer_'+order+'.id'));
            clearInterval(vm.$get('timer_'+order+'.live_counter'));
            // send stop data to server;
        },
        getDriver(id,order)
        {
            var vm = this;
            if(order == 1 || order == 2 || order == 3)
            {
                for (var i = 0; i < vm.van_drivers.length; i++) {
                    if(vm.van_drivers[i].id == id)
                    {
                        return vm.$get('van_drivers['+i+']');
                    }
                }
            }
            if(order == 4 || order == 5 || order == 6)
            {
                for (var i = 0; i < vm.truck_drivers.length; i++) {
                    if(vm.truck_drivers[i].id == id)
                    {
                        return vm.$get('truck_drivers['+i+']');
                    }
                }
            }
        },
        getDiimsData(diims_id,order, data)
        {
            var vm = this;
            var driver = vm.getDriver(data.driver_id, order);
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

//                    console.log('ReportType: '+reportType);
//                    console.log('IgnitionKey: '+ignitionKey);

                    var vehicle_is_started = reportType == 2 && (ignitionKey == 0 || ignitionKey == 1);
                    var vehicle_is_stopped = reportType == 2 && ignitionKey == 2;
                    var vehicle_is_running = reportType == 0 && ignitionKey == 2;

//                    console.log('Started: '+vehicle_is_started);
//                    console.log('Stopped: '+vehicle_is_stopped);
//                    console.log('Running: '+vehicle_is_running);
                    console.log('::::::::::NEW DATA LINE::::::::::');

                    if(vehicle_is_started)
                    {
                        console.log('Vehicle is Started:');
                        console.log('start_time_check: '+driver.heat_stats.start_time);
                        if(!driver.heat_stats.start_time)
                        {
                            driver.heat_stats.start_time = Date.now() / 1000;
                            console.log('Start_time not set, Time: '+driver.heat_stats.start_time);
                            var time_data = {
                                '_token' : vm.csrf_token,
                                'heat_id' : vm.heat.id,
                                'driver_id' : driver.id,
                                'vehicle_id' : vehicle_id,
                                'start_time' : driver.heat_stats.start_time
                            };
                            vm.$http.post('/api/livescore/updateStartTime/',time_data)
                                .then( function(response) {
                                    console.log('Updating Start Time');
                                });
                        }

                        var is_timer_running = vm.$get('timer_'+order+'.live_counter');

                        console.log('is_timer_running: '+is_timer_running);
                        if(!is_timer_running)
                        {
                            console.log('Start_Timer not Running, starting timer!');
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
                        if(typeof vm.$get('timer_'+order+'.live_counter') != undefined)
                        {
                            console.log('Stopping timer: '+vm.$get('timer_'+order+'.live_counter'));
                            clearInterval(vm.$get('timer_'+order+'.live_counter'));
                            vm.$set('timer_'+order+'.live_counter', undefined);
                            console.log(driver.heat_stats.stop_time);
                            if(!driver.heat_stats.stop_time)
                            {
                                driver.heat_stats.stop_time = Date.now() / 1000;
                                console.log('Stop_Time not set, Time: '+driver.heat_stats.stop_time);
                                var time_data = {
                                    '_token' : vm.csrf_token,
                                    'heat_id' : vm.heat.id,
                                    'driver_id' : driver.id,
                                    'vehicle_id' : vehicle_id,
                                    'stop_time' : driver.heat_stats.stop_time
                                };
                                vm.$http.post('/api/livescore/updateStopTime/',time_data)
                                    .then( function(response) {
                                        console.log('Updating Stop Time');
                                    });
                            }
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
            if(order == 6)
            {
                vm.truck_3.diims_data.push(diims_data);
                marker = "truck_3";
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
            data.distance = parseFloat(distance_driven_in_km).toFixed(3);
            data.fuel_used = parseFloat(litres_of_fuel_used).toFixed(3);
            data.accelerator = array_2.Accelerator;
            data.rpm = array_2.RPM;
            data._token = vm.csrf_token;
            data.m1_kml = null;
            data.m2_kml = null;
            data.m3_kml = null;
            data.m4_kml = null;
            data.m5_kml = null;
            if(data.kml == Infinity) { data.kml = 0.00; }

            var driver = vm.getDriver(data.driver_id,order);
            driver.heat_stats.kml = data.kml;
            driver.heat_stats.distance = data.distance;
            driver.heat_stats.fuel_used = data.fuel_used;
            driver.heat_stats.accelerator = data.accelerator;
            driver.heat_stats.rpm = data.rpm;

            var time_passed = (Date.now() / 1000) - driver.heat_stats.start_time;

            console.log('Time Passed: '+time_passed);
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

            var accelerator = (driver.heat_stats.accelerator == 0) ? driver.heat_stats.accelerator: 1;

            if(order == 1)
            {
                vm.$set('van_1.driver',driver);
                acc_gauges[0].set(accelerator);
                rpm_gauges[0].set(driver.heat_stats.rpm);
            }
            if(order == 2)
            {
                vm.$set('van_2.driver',driver);
                acc_gauges[1].set(accelerator);
                rpm_gauges[1].set(driver.heat_stats.rpm);
            }
            if(order == 3)
            {
                vm.$set('van_3.driver',driver);
                acc_gauges[2].set(accelerator);
                rpm_gauges[2].set(driver.heat_stats.rpm);
            }
            if(order == 4)
            {
                vm.$set('truck_1.driver',driver);
                acc_gauges[3].set(accelerator);
                rpm_gauges[3].set(driver.heat_stats.rpm);

            }
            if(order == 5)
            {
                vm.$set('truck_2.driver',driver);
                acc_gauges[4].set(accelerator);
                rpm_gauges[4].set(driver.heat_stats.rpm);
            }
            if(order == 6)
            {
                vm.$set('truck_3.driver',driver);
                acc_gauges[5].set(accelerator);
                rpm_gauges[5].set(driver.heat_stats.rpm);
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
        },
        updateSections (section,text) {
            $('.player-list .right > .sections > .section:nth-child(' + section + ')').text(text);
//            ++child;
//            if(child > 5) {
//                clearInterval(sections);
//            }
        },
        changeStep() {
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
        }
    },
    created(){
    },
    ready(){
        var vm = this;
        vm.webSocketListeners();
        vm.getHeatData(1);

        child = 1;
        currentStep = 1;

//        var stepChanger = setInterval(this.changeStep, 10000); // 10 seconds switch left hand side

        var speedometer = {
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

        acc_gauges = [];
        rpm_gauges = [];
        target_speedometer = [] ;
        target_rpm = [];

        target_speedometer.push($('#van_speedometer_1')[0]);
        target_rpm.push($('#van_rpm_1')[0]);

        target_speedometer.push($('#van_speedometer_2')[0]);
        target_rpm.push($('#van_rpm_2')[0]);

        target_speedometer.push($('#van_speedometer_3')[0]);
        target_rpm.push($('#van_rpm_3')[0]);

        target_speedometer.push($('#truck_speedometer_1')[0]);
        target_rpm.push($('#truck_rpm_1')[0]);

        target_speedometer.push($('#truck_speedometer_2')[0]);
        target_rpm.push($('#truck_rpm_2')[0]);

        target_speedometer.push($('#truck_speedometer_3')[0]);
        target_rpm.push($('#truck_rpm_3')[0]);

        for (var i = 0; i < target_speedometer.length; i++)
        {
            acc_gauges.push(new Gauge(target_speedometer[i]).setOptions(speedometer));

            acc_gauges[i].maxValue = 100;
            acc_gauges[i].animationSpeed = 32;
            acc_gauges[i].set(50);
        }

        for (var i = 0; i < target_rpm.length; i++)
        {
            rpm_gauges.push(new Gauge(target_rpm[i]).setOptions(RPM));

            rpm_gauges[i].maxValue = 5000;
            rpm_gauges[i].animationSpeed = 32;
            rpm_gauges[i].set(2500);
        }

    }
}
</script>


<!--<div class="speed-o-meter">-->
    <!--<canvas id="truck_speedometer{{truck.id}}" height="20px" width="50px"></canvas>-->
    <!--<canvas id="truck_rpm{{truck.id}}" height="20px" width="50px"></canvas>-->
<!--</div>-->