

<script>

    import {Line} from 'vue-chartjs';
    export default {
        extends: Line,
        data(){

            return {

                url:'http://127.0.0.1:8000/products',
                years:[],
                labels:[],
                prices:[],
                data: ''

            }
        },

        methods:{

          getProducts(){

              axios.get(this.url).then((response)=>{
                 // console.log(response.data);

                  this.data=response.data;
                  if (this.data){

                      this.data.forEach(element=>{
                         this.years.push(element.year);
                         this.labels.push(element.name);
                         this.prices.push(element.price);


                      });

                      this.renderChart({
                         labels:this.years,
                         datasets:[
                             {
                                 label:'Sales',
                                 backgroundColor:'#f87979',
                                 data:this.prices
                             }
                         ]

                      },{responsiv:true,maintainAspectRatio:false});
                  }


                  else {

                      console.log('NO DATA');
                  }
              });
          }
        },
        mounted() {
          this.getProducts();
        }
    }
    
</script>
