<template>
    <div>
         <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center mt-5">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updateCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId"> Update Name</label>
                    <input type="text" class="form-control" id="categoryId"
                     v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                     <has-error :form="form" field="cat_name"></has-error>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</template>
<script>
export default {
    name :"Edit",
    mounted(){
       axios.get(`/editcategory/${this.$route.params.catid}`)
       .then((response)=>{
           this.form.fill(response.data.category)
       })
    },
    data(){
        return{
            form: new Form({
                cat_name : '',
            })
        }
    },
    methods :{
        updateCategory(){
            this.form.post(`/update-category/${this.$route.params.catid}`)
            .then((response)=>{
                this.$router.push('/category-list')
                Toast.fire({
                type: 'success',
                title: 'Category updated successfully'
              })
            })
            .catch(()=>{
                
            })
 
        }
    }
}
</script>