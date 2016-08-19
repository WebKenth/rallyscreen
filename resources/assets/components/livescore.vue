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
                                    Time: {{ truck_driver.heat_stats.time }} Distance: {{ truck_driver.heat_stats.distance }} Fuel Used: {{ truck_driver.heat_stats.fuel_used }} km/l: {{ truck_driver.heat_stats.kml }} RPM: {{ truck_driver.heat_stats.rpm }} Accelerator: {{ truck_driver.heat_stats.accelerator }}
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
                                            <span class="progress" data-progress="0"></span>
                                            <span class="counter">{{ Math.floor((truck_driver.heat_stats.time % 3600) / 60) }}:{{ (truck_driver.heat_stats.time % 3600) % 60 }}</span>
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
                                    Time: {{ van_driver.heat_stats.time }} Distance: {{ van_driver.heat_stats.distance }} Fuel Used: {{ van_driver.heat_stats.fuel_used }} km/l: {{ van_driver.heat_stats.kml }} RPM: {{ van_driver.heat_stats.rpm }} Accelerator: {{ van_driver.heat_stats.accelerator }}
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
                                        <span class="counter">{{ Math.floor((van_driver.heat_stats.time % 3600) / 60) }}:{{ (van_driver.heat_stats.time % 3600) % 60 }}</span>
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
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/truck_2.png">
                                        <span class="current-driver">
                                            {{ (truck_1.driver) ? truck_1.driver.first_name : '' }}
                                            {{ (truck_1.driver) ? truck_1.driver.middle_name : '' }}
                                            {{ (truck_1.driver) ? truck_1.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{ truck_1.brand }}</span></span>
                                            Model: <span class="model">{{ truck_1.model }}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{ truck_1.reg_nr }}</span></span>
                                            Køretøj: <span class="track-number">{{truck_1.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="truck_speedometer{{truck_1.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="truck_rpm{{truck_1.id}}" height="20px" width="50px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/truck_2.png">
                                        <span class="current-driver">
                                            {{ (truck_2.driver) ? truck_2.driver.first_name : '' }}
                                            {{ (truck_2.driver) ? truck_2.driver.middle_name : '' }}
                                            {{ (truck_2.driver) ? truck_2.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{ truck_2.brand }}</span></span>
                                            Model: <span class="model">{{ truck_2.model }}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{ truck_2.reg_nr }}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
                                            Køretøj: <span class="track-number">{{truck_2.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="truck_speedometer{{truck_2.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="truck_rpm{{truck_2.id}}" height="20px" width="50px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/truck_2.png">
                                        <span class="current-driver">
                                            {{ (truck_3.driver) ? truck_3.driver.first_name : '' }}
                                            {{ (truck_3.driver) ? truck_3.driver.middle_name : '' }}
                                            {{ (truck_3.driver) ? truck_3.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{ truck_3.brand }}</span></span>
                                            Model: <span class="model">{{ truck_3.model }}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{ truck_3.reg_nr }}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
                                            Køretøj: <span class="track-number">{{truck_3.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="truck_speedometer{{truck_3.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="truck_rpm{{truck_3.id}}" height="20px" width="50px"></canvas>
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
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/van_2.png">
                                        <span class="current-driver">
                                            {{ (van_1.driver) ? van_1.driver.first_name : '' }}
                                            {{ (van_1.driver) ? van_1.driver.middle_name : '' }}
                                            {{ (van_1.driver) ? van_1.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{van_1.brand}}</span></span>
                                            Model: <span class="model">{{van_1.model}}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{van_1.reg_nr}}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
                                            Køretøj: <span class="track-number">{{van_1.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="van_speedometer{{van_1.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="van_rpm{{van_1.id}}" height="20px" width="50px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/van_2.png">
                                        <span class="current-driver">
                                            {{ (van_2.driver) ? van_2.driver.first_name : '' }}
                                            {{ (van_2.driver) ? van_2.driver.middle_name : '' }}
                                            {{ (van_2.driver) ? van_2.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{van_2.brand}}</span></span>
                                            Model: <span class="model">{{van_2.model}}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{van_2.reg_nr}}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
                                            Køretøj: <span class="track-number">{{van_2.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="van_speedometer{{van_2.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="van_rpm{{van_2.id}}" height="20px" width="50px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="static-data">
                                    <div class="left">
                                        <img src="/images/van_2.png">
                                        <span class="current-driver">
                                            {{ (van_3.driver) ? van_3.driver.first_name : '' }}
                                            {{ (van_3.driver) ? van_3.driver.middle_name : '' }}
                                            {{ (van_3.driver) ? van_3.driver.last_name : '' }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{van_3.brand}}</span></span>
                                            Model: <span class="model">{{van_3.model}}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{van_3.reg_nr}}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
                                            Køretøj: <span class="track-number">{{van_3.name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dynamic-data">
                                    <div class="left">
                                        <div class="throttle"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="fuel-usage"></div>
                                    </div>
                                    <div class="right">
                                        <div class="speed-o-meter">
                                            <canvas id="van_speedometer{{van_3.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="van_rpm{{van_3.id}}" height="20px" width="50px"></canvas>
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
.truck-list img, .van-list img {
    height: auto;
    width: 100px;
    margin-top: 12px;
}
</style>
<script>
    // 'http://rallyscreen.app:3000'
    // 'http://139.59.177.94:3000'
//    4341
//    6064
//    0950
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
            truck_1: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            truck_2: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            truck_3: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            van_1: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            van_2: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            van_3: {
                driver:{
                    image:''
                },
                diims_data:{
                    TotalDrivingTime:''
                }
            },
            diims_data : [],
            timer_1:{},
            timer_2:{},
            timer_3:{},
            timer_4:{},
            timer_5:{},
            timer_6:{},
            heat_refresh_timer:{}
        }
    },
    computed: {
    },
    methods: {
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
            vm.stopDriverLoop(1);
            vm.stopDriverLoop(2);
            vm.stopDriverLoop(3);
            vm.stopDriverLoop(4);
            vm.stopDriverLoop(5);
            vm.stopDriverLoop(6);
            // Top 10
            //      Update Truck Drivers
            //      Update Van Drivers

            // Live Vehicle Data
            //      Update Trucks
            //      Update Vans
            this.getHeatData(heat_id);
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
                    if(order == 1){ this.$set('van_1',result.vehicle); }
                    if(order == 2){ this.$set('van_2',result.vehicle); }
                    if(order == 3){ this.$set('van_3',result.vehicle); }
                    if(order == 4){ this.$set('truck_1',result.vehicle); }
                    if(order == 5){ this.$set('truck_2',result.vehicle); }
                    if(order == 6){ this.$set('truck_3',result.vehicle); }
                    this.startDriverLoop(result.vehicle, order, data);
                });
        },
        startDriverLoop(vehicle, order, data)
        {
            var vm = this;
            var driver;
//            if(order == 1 || order == 2 || order == 3)
//            {
//                for (var i = 0; i < vm.van_drivers.length; i++)
//                {
//                    if(vm.van_drivers[i].id == data.driver_id)
//                    {
//                        vm.van_drivers[i].heat_stats.time++;
//                    }
//                }
//            }
//            if(order == 4 || order == 5 || order == 6)
//            {
//                for (var i = 0; i < vm.truck_drivers.length; i++)
//                {
//                    if(vm.truck_drivers[i].id == data.driver_id)
//                    {
//                        vm.truck_drivers[i].heat_stats.time++;
//                        console.log(vm.truck_drivers[i].heat_stats.time);
//                    }
//                }
//            }

            var timer = {};
            timer.id = setInterval(function(){ vm.getDiimsData(vehicle.diims_id, order); },10000);
            timer.counter = 0;
            if(order == 1){ this.$set('timer_1',timer); }
            if(order == 2){ this.$set('timer_2',timer); }
            if(order == 3){ this.$set('timer_3',timer); }
            if(order == 4){ this.$set('timer_4',timer); }
            if(order == 5){ this.$set('timer_5',timer); }
            if(order == 6){ this.$set('timer_6',timer); }
        },
        stopDriverLoop(order)
        {
            var vm = this;
            if(order == 1){ clearInterval(vm.timer_1.id); }
            if(order == 2){ clearInterval(vm.timer_2.id); }
            if(order == 3){ clearInterval(vm.timer_3.id); }
            if(order == 4){ clearInterval(vm.timer_4.id); }
            if(order == 5){ clearInterval(vm.timer_5.id); }
            if(order == 6){ clearInterval(vm.timer_6.id); }
        },
        getDiimsData(diims_id,order)
        {
            var vm = this;
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
                    var marker;
//                    if(result[0].ReportType != 2 && result[0].IgnitionKey == 2)
//                    {
                        if(order == 1)
                        {
                            vm.van_1.diims_data.push(result[0]);
                            marker = "van_1";
                            vm.$set('timer_1.counter', vm.timer_1.counter++)
                        }
                        if(order == 2)
                        {
                            vm.van_2.diims_data.push(result[0]);
                            marker = "van_2";
                            vm.$set('timer_2.counter', vm.timer_2.counter++)
                        }
                        if(order == 3)
                        {
                            vm.van_3.diims_data.push(result[0]);
                            marker = "van_3";
                            vm.$set('timer_3.counter', vm.timer_3.counter++)
                        }
                        if(order == 4)
                        {
                            vm.truck_1.diims_data.push(result[0]);
                            marker = "truck_1";
                            vm.$set('timer_4.counter', vm.timer_4.counter++)
                        }
                        if(order == 5)
                        {
                            vm.truck_2.diims_data.push(result[0]);
                            marker = "truck_2";
                            vm.$set('timer_5.counter', vm.timer_5.counter++)
                        }
                        if(order == 6)
                        {
                            vm.truck_3.diims_data.push(result[0]);
                            marker = "truck_3";
                            vm.$set('timer_6.counter', vm.timer_6.counter++)
                        }

                        vm.updateHeatStats(order);
//                    }
                    vm.updateMap(marker);
                }
            });
        },
        updateHeatStats(order)
        {
            var vm = this;
            var counter = vm.$get('timer_'+order+'.counter');
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
            console.log('::: MATH TIME :::  '+order);

            var diims_1_Odometer = array_1.Odometer / 10;
            var diims_2_Odometer = array_2.Odometer / 10;
//            console.log('Diims_1_odo: '+diims_1_Odometer);
//            console.log('Diims_2_odo: '+diims_2_Odometer);

            var diims_1_TotalFuelUsed = array_1.TotalFuelUsed;
            var diims_2_TotalFuelUsed = array_2.TotalFuelUsed;
//            console.log('Diims_1_fuel: '+diims_1_TotalFuelUsed);
//            console.log('Diims_2_fuel: '+diims_2_TotalFuelUsed);

            var distance_driven_in_km = diims_2_Odometer - diims_1_Odometer; // KM siden sidste opdatering
            var litres_of_fuel_used = diims_2_TotalFuelUsed - diims_1_TotalFuelUsed; // L brugt siden sidste opdatering

            console.log('distance in km: '+distance_driven_in_km);
            console.log('Fuel used in Litres: '+litres_of_fuel_used);

            var kml = 0;
            if( distance_driven_in_km != 0 || litres_of_fuel_used != 0)
            {
                kml = distance_driven_in_km / litres_of_fuel_used;
            }
            console.log('kml: '+kml);

            data.kml = parseFloat(kml).toFixed(3);
            data.distance = parseFloat(distance_driven_in_km).toFixed(3);
            data.fuel_used = parseFloat(litres_of_fuel_used).toFixed(3);
            data.accelerator = array_2.Accelerator;
            data.rpm = array_2.RPM;
            data._token = vm.csrf_token;

            if(data.kml == Infinity)
            {
                data.kml = 0.00;
            }


            console.log('kml : '+data.kml);
            console.log('distance : '+data.distance);
            console.log('fuel_used : '+data.fuel_used);

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
        var timer = setInterval(function(){ vm.getHeatData(vm.heat.id) } ,10000);
        vm.$set('heat_refresh_timer',timer);

        child = 1;
        currentStep = 1;

//        var stepChanger = setInterval(this.changeStep, 5000);




//        var speedometer = {
//            lines: 12, // The number of lines to draw
//            angle: 0.15, // The length of each line
//            lineWidth: 0.44, // The line thickness
//            pointer: {
//            length: 0.9, // The radius of the inner circle
//            strokeWidth: 0.035, // The rotation offset
//            color: '#000000' // Fill color
//            },
//            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
//            colorStart: '#bb2b00',   // Colors
//            colorStop: '#8FC0DA',    // just experiment with them
//            strokeColor: '#E0E0E0',   // to see which ones work best for you
//            generateGradient: true
//        };
//        var RPM = {
//            lines: 12, // The number of lines to draw
//            angle: 0.15, // The length of each line
//            lineWidth: 0.44, // The line thickness
//            pointer: {
//            length: 0.9, // The radius of the inner circle
//            strokeWidth: 0.035, // The rotation offset
//            color: '#000000' // Fill color
//            },
//            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
//            colorStart: '#6FADCF',   // Colors
//            colorStop: '#8FC0DA',    // just experiment with them
//            strokeColor: '#E0E0E0',   // to see which ones work best for you
//            generateGradient: true
//        };
//        for (var i = 0; i < this.trucks.length; i++)
//        {
//            var target = document.getElementById('truck_speedometer'+this.trucks[i].id); // your canvas element
//            var gauge = new Gauge(target).setOptions(speedometer); // create sexy gauge!
//            gauge.maxValue = 3000; // set max gauge value
//            gauge.animationSpeed = 22; // set animation speed (32 is default value)
//            gauge.set(1500); // set actual value
//            var target2 = document.getElementById('truck_rpm'+this.trucks[i].id); // your canvas element
//            var gauge2 = new Gauge(target2).setOptions(RPM); // create sexy gauge2!
//            gauge2.maxValue = 3000; // set max gauge2 value
//            gauge2.animationSpeed = 22; // set animation speed (32 is default value)
//            gauge2.set(1500); // set actual value
//        }
//        for (var i = 0; i < this.vans.length; i++)
//        {
//            var target3 = document.getElementById('van_speedometer'+this.vans[i].id); // your canvas element
//            var gauge3 = new Gauge(target3).setOptions(speedometer); // create sexy gauge3!
//            gauge3.maxValue = 3000; // set max gauge3 value
//            gauge3.animationSpeed = 22; // set animation speed (32 is default value)
//            gauge3.set(1500); // set actual value
//            var target4 = document.getElementById('van_rpm'+this.vans[i].id); // your canvas element
//            var gauge4 = new Gauge(target4).setOptions(RPM); // create sexy gauge4!
//            gauge4.maxValue = 3000; // set max gauge4 value
//            gauge4.animationSpeed = 22; // set animation speed (32 is default value)
//            gauge4.set(1500); // set actual value
//        }
    }
}
</script>


<!--<div class="speed-o-meter">-->
    <!--<canvas id="truck_speedometer{{truck.id}}" height="20px" width="50px"></canvas>-->
    <!--<canvas id="truck_rpm{{truck.id}}" height="20px" width="50px"></canvas>-->
<!--</div>-->