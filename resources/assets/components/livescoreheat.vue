<template>
    <legend>Aktive Heat: {{heat_id}}</legend>
        <div class="active-heat">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="go-for-launch btn btn-default">Sæt Igang!</a>
                        </div>
                        <div class="col-md-6">

                            <h4>Navn</h4>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</template>
<style>

</style>
<script>

export default
{
    props:{
    },
    data(){
        return{
            drivers: {}
        }
    },
    computed: {
        heat_id()
        {
            return $('#current_heat').val();
        }
    },
    methods: {
        getActiveHeatData(heat_id)
        {
//            this.$http.get('/api/currentHeat/'+heat_id)
//                .then( function(response)
//                {
//                    var data = JSON.parse(response.data);
//                    this.$set('drivers',data.drivers);
//
//                    return true;
//                }, function (response){
//                    console.log(response);
//                });
        }
    },
    ready(){
        var vm = this;
        this.getActiveHeatData(vm.heat_id);
    }
}
</script>