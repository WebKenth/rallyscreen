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
                                <img src="images/truck.png">
                                Live Lastbil
                            </div>
                            <ul class="player-list">
                                <li v-for="truck_driver in truck_drivers">
                                    <div class="left" data-driver="{{truck_driver.first_name+' '+truck_driver.middle_name+' '+truck_driver.last_name}}">
                                        <img v-bind:src="truck_driver.image">
                                        <span>Tid:</span>
                                    </div>
                                    <div class="right">
                                        <div class="sections">
                                            <div class="section"></div>
                                            <div class="section"></div>
                                            <div class="section"></div>
                                            <div class="section"></div>
                                            <div class="section"></div>
                                        </div>
                                        <div class="time">
                                            <span class="progress" data-progress="0"></span>
                                            <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                        </div>
                                    </div>
                                    <div class="end">
                                        <span class="total">{{ (truck_driver.heat_stats.kml) ? truck_driver.heat_stats.kml : 'Venter på Start' }}</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="step" data-step="2">
                            <div class="list-indikator">
                                <img src="images/truck.png">
                                Top 10 Lastbiler
                            </div>
                            <ul class="top-list">
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="step" data-step="3">
                            <div class="list-indikator">
                                <img src="images/van.png">
                                Live Vans
                            </div>
                            <ul class="player-list">
                                <li>
                                <div class="left" data-driver="Kasper Legarth">
                                    <img src="images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div></li>
                                <li>
                                <div class="left" data-driver="Kasper Legarth">
                                    <img src="images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div></li>
                                <li>
                                <div class="left" data-driver="Kasper Legarth">
                                    <img src="images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div></li>
                                <li>
                                <div class="left" data-driver="Kasper Legarth">
                                    <img src="images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div></li>
                                <li>
                                <div class="left" data-driver="Kasper Legarth">
                                    <img src="images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div></li>
                            </ul>
                        </div>
                        <div class="step" data-step="4">
                            <div class="list-indikator">
                                <img src="images/van.png">
                                Top 10 Vans
                            </div>
                            <ul class="top-list">
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner-top-list-container">
                                        <img src="images/kasper.png">
                                        <span class="player-name">Kapser Legarth</span>
                                        <div class="results">
                                            <div class="time">23:43</div>
                                            <div class="fuel">16.7 km/l</div>
                                        </div>
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
                                        <img v-bind:src="truck_1.driver.image">
                                        Chauffør:
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
                                        <img v-bind:src="truck_2.driver.image">
                                        Chauffør:
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
                                        <img v-bind:src="truck_3.driver.image">
                                        Chauffør:
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
                                        <img v-bind:src="van_1.driver.image">
                                        Chauffør:
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
                                        <img v-bind:src="van_2.driver.image">
                                        Chauffør:
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
                                        <img v-bind:src="van_3.driver.image">
                                        Chauffør:
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
.truck-list img,.van-list img{
    height: 50px;
    width: auto;
}
</style>
<script>
    var socket = io('http://139.59.177.94:3000');
    console.log('http://139.59.177.94:3000');
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
                }
            },
            truck_2: {
                driver:{
                    image:''
                }
            },
            truck_3: {
                driver:{
                    image:''
                }
            },
            van_1: {
                driver:{
                    image:''
                }
            },
            van_2: {
                driver:{
                    image:''
                }
            },
            van_3: {
                driver:{
                    image:''
                }
            }
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
                    console.log(data);
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
            data._token = this.csrf_token;
            order = data.order;
            this.$http
                .post('/api/livescore/getLiveVehicle/',data)
                .then( function(response) {
                    var result = JSON.parse(response.data);
                    console.log(result);
                    console.log(order);
                    if(order == 1)
                    {
                        this.$set('van_1',result.vehicle);
                    }
                    if(order == 2)
                    {
                        this.$set('van_2',result.vehicle);
                    }
                    if(order == 3)
                    {
                        this.$set('van_3',result.vehicle);
                    }
                    if(order == 4)
                    {
                        this.$set('truck_1',result.vehicle);
                    }
                    if(order == 5)
                    {
                        this.$set('truck_2',result.vehicle);
                    }
                    if(order == 6)
                    {
                        this.$set('truck_3',result.vehicle);
                    }
                    this.startDriverLoop(vehicle);
                });
        },
        startDriverLoop(vehicle)
        {
            var driver = vehicle.driver;


        },
        getDiimsData(diims_id)
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
                    console.log(result[0].Lat);
                    var test = vm.van_1;
                    test.lat = result[0].Lat;
                    test.lng = result[0].Long;
                    vm.updateMap(test);
                }
            });
        },
        updateMap(data)
        {
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

                if(currentStep == 4) {
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
        this.webSocketListeners();
        this.getHeatData(1);

        this.getDiimsData(869606020004341);
        // grab latest Data
        $.ajax({
            type: "POST",
            url: 'http://eco.commotive.dk/WebService.asmx/GetLatestData',
            contentType: "application/json; charset=utf-8",
            crossDomain: true,
            data: JSON.stringify({ DeviceId: 869606020004341 }),
            dataType: "json",
            success: function (data)
            {
                console.log(data);
            }
        });



        child = 1;
        currentStep = 1;

        random = Math.floor((Math.random() * 150000) + 270000);
//        sections = setInterval(this.updateSections, 1000);
        this.updateSections(1, "13.2 KM/l");
        this.updateSections(2, "10.2 KM/l");
        this.updateSections(3, "12.2 KM/l");
        this.updateSections(4, "15.2 KM/l");
        this.updateSections(5, "3.2 KM/l");
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