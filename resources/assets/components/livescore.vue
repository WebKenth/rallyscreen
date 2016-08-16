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
                    Heat: <span class="heat-number">{{heat.id}}</span>
                </div>
            </div>
        </div>
    </header>

    <section class="player-score">
        <div class="section-grid">
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="player-list">
                            <li v-for="driver in drivers">
                                <div class="left" data-driver="{{driver.first_name}} {{driver.middle_name}} {{driver.last_name}}">
                                    <img v-bind:src="driver.image">
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
                                        <span class="progress" data-progress="{{driver.counter.progress}}"></span>
                                        <span class="counter">
                                            <span class="minutes">{{ driver.counter.minutes }}</span>:<span class="seconds">{{ driver.counter.seconds }}</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div>
                            </li>
                        </ul>
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
                            <li v-for="truck in trucks">
                                <div class="static-data">
                                    <div class="left">
                                        Chauffør: <span class="current-driver"> TEMP </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{ truck.brand }}</span></span>
                                            Model: <span class="model">{{ truck.model }}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{ truck.reg_nr }}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
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
                                            <canvas id="truck_speedometer{{truck.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="truck_rpm{{truck.id}}" height="20px" width="50px"></canvas>
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
                            <li v-for="van in vans">
                                <div class="static-data">
                                    <div class="left">
                                        Chauffør: <span class="current-driver"> TEMP </span>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <span>Mærke: <span class="brand">{{van.brand}}</span></span>
                                            Model: <span class="model">{{van.model}}</span>
                                        </div>
                                        <div>
                                            <span>Regnr: <span class="registration">{{van.reg_nr}}</span></span>
                                            <!--Løbs nummer: <span class="track-number">3</span>-->
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
                                            <canvas id="van_speedometer{{van.id}}" height="20px" width="50px"></canvas>
                                            <canvas id="van_rpm{{van.id}}" height="20px" width="50px"></canvas>
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

</style>
<script>
export default
{
    props:{
        heat: {
          coerce: function (val) {
            return JSON.parse(val);
          }
        },
        vehicles: {
          coerce: function (val) {
            return JSON.parse(val);
          }
        },
        drivers: {
          coerce: function (val) {
              return JSON.parse(val);
          }
        }
    },
    data(){
        return{
            timer_driver_timer : true,
            timer_driver_progress: true
        }
    },
    computed: {
        trucks: function()
        {
            trucks = [];
            for (var i = 0; i < this.vehicles.length; i++)
            {
                if(this.vehicles[i].type == "truck")
                {
                    trucks.push(this.vehicles[i]);
                }
            }
            return trucks;
        },
        vans : function()
        {
            vans = [];
            for (var i = 0; i < this.vehicles.length; i++)
            {
                if(this.vehicles[i].type == "van")
                {
                    vans.push(this.vehicles[i]);
                }
            }
            return vans;
        }
        
    },
    methods: {
        startDemo: function()
        {
            this.timer_driver_timer = setInterval(this.updateDriversCounter, 1000);
            this.timer_driver_progress = setInterval(this.updateDriversProgress, 15600);
        },
        updateDriversCounter: function()
        {
            for (var i = 0; i < this.drivers.length; i++)
            {
                var counter = this.drivers[i].counter;
                if(counter.seconds < 59)
                {
                    ++counter.seconds;
                    if(counter.seconds < 10) {
                        counter.seconds = ('0' + counter.seconds).slice(-2);
                    }
                } else {
                    counter.seconds = 0;
                    ++counter.minutes;
                    if(counter.minutes < 10) {
                        counter.minutes = ('0' + counter.minutes).slice(-2);
                    }
                }
                this.drivers[i].counter = counter;
            }
        },
        updateDriversProgress: function()
        {
//            for (var i = 0; i < this.drivers.length; i++)
//            {
//                var progress = this.drivers[i].counter.progress;
//                progress++;
//                this.drivers[i].counter.$set('progress',progress);
//            }
        }
        
    },
    created(){
      for (var i = 0; i < this.drivers.length; i++)
        {
            var driver = this.drivers[i];
            driver.counter ={
                    minutes: "00",
                    seconds: i+"0",
                    progress : i+"0"
                };
            this.drivers[i] = driver;
        }
    },
    ready(){
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
            colorStart: '#bb2b00',   // Colors
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
            colorStart: '#6FADCF',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
        };
        for (var i = 0; i < this.trucks.length; i++)
        {
            var target = document.getElementById('truck_speedometer'+this.trucks[i].id); // your canvas element
            var gauge = new Gauge(target).setOptions(speedometer); // create sexy gauge!
            gauge.maxValue = 3000; // set max gauge value
            gauge.animationSpeed = 22; // set animation speed (32 is default value)
            gauge.set(1500); // set actual value
            var target2 = document.getElementById('truck_rpm'+this.trucks[i].id); // your canvas element
            var gauge2 = new Gauge(target2).setOptions(RPM); // create sexy gauge2!
            gauge2.maxValue = 3000; // set max gauge2 value
            gauge2.animationSpeed = 22; // set animation speed (32 is default value)
            gauge2.set(1500); // set actual value
        }
        for (var i = 0; i < this.vans.length; i++)
        {
            var target3 = document.getElementById('van_speedometer'+this.vans[i].id); // your canvas element
            var gauge3 = new Gauge(target3).setOptions(speedometer); // create sexy gauge3!
            gauge3.maxValue = 3000; // set max gauge3 value
            gauge3.animationSpeed = 22; // set animation speed (32 is default value)
            gauge3.set(1500); // set actual value
            var target4 = document.getElementById('van_rpm'+this.vans[i].id); // your canvas element
            var gauge4 = new Gauge(target4).setOptions(RPM); // create sexy gauge4!
            gauge4.maxValue = 3000; // set max gauge4 value
            gauge4.animationSpeed = 22; // set animation speed (32 is default value)
            gauge4.set(1500); // set actual value
        }
    }
}
</script>