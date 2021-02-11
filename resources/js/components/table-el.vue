<template>
    <div class="mt-5">
        <form @submit.prevent="submit">
            <div class="form-group row">
                <label for="Name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-3">
                    <input id="Name" type="text" class="form-control" name="name" v-model="Name" autofocus>
                    <div class="alert alert-danger" v-if="errors && errors.Name">
                        {{ errors.Name[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Bedrooms" class="col-md-4 col-form-label text-md-right">Bedrooms</label>

                <div class="col-md-3">
                    <input id="Bedrooms" type="number" min="0" class="form-control" name="Bedrooms" v-model="Bedrooms" autocomplete="Bedrooms">
                    <div class="alert alert-danger" v-if="errors && errors.Bedrooms">
                        {{ errors.Bedrooms[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Bathrooms" class="col-md-4 col-form-label text-md-right">Bathrooms</label>

                <div class="col-md-3">
                    <input id="Bathrooms" type="number" min="0" class="form-control" name="Bathrooms" v-model="Bathrooms" autocomplete="Bathrooms">
                    <div class="alert alert-danger" v-if="errors && errors.Bathrooms">
                        {{ errors.Bathrooms[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Storeys" class="col-md-4 col-form-label text-md-right">Storeys</label>

                <div class="col-md-3">
                    <input id="Storeys" type="number" min="0" class="form-control" name="Storeys" v-model="Storeys" autocomplete="Storeys">
                    <div class="alert alert-danger" v-if="errors && errors.Storeys">
                        {{ errors.Storeys[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Garages" class="col-md-4 col-form-label text-md-right">Garages</label>

                <div class="col-md-3">
                    <input id="Garages" type="number" min="0" class="form-control" name="Garages" v-model="Garages" autocomplete="Garages">
                    <div class="alert alert-danger" v-if="errors && errors.Garages">
                        {{ errors.Garages[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="PriceMin" class="col-md-4 col-form-label text-md-right">PriceMin</label>
                <div class="col-md-1">
                    <input id="PriceMin" type="number" min="0" class="form-control" name="PriceMin" v-model="PriceMin" autocomplete="PriceMin">
                    <div class="alert alert-danger" v-if="errors && errors.PriceMin">
                        {{ errors.PriceMin[0] }}
                    </div>
                </div>
                <label for="PriceMax" class="col-form-label">PriceMax</label>
                <div class="col-md-1">
                    <input id="PriceMax" type="number" min="0" class="form-control" name="PriceMax" v-model="PriceMax" autocomplete="PriceMax">
                    <div class="alert alert-danger" v-if="errors && errors.PriceMax">
                        {{ errors.PriceMax[0] }}
                    </div>
                </div>
            </div>
            <div class="form-group row">

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Submit search
                    </button>
                </div>
            </div>
        </form>
        <table class="table mt-5">
            <thead class="thead-light">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Name</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Storeys</th>
                <th scope="col">Garages</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(row, rindex) in fields">
                <td scope="row">{{ rindex }}</td>
                <td>{{ row.Name }}</td>
                <td>{{ row.Bedrooms }}</td>
                <td>{{ row.Bathrooms }}</td>
                <td>{{ row.Storeys }}</td>
                <td>{{ row.Garages }}</td>
                <td>{{ row.Price }}</td>
            </tr>
            </tbody>
        </table>
        <div class="justify-content-center text-center" v-show="loading"><cube-spin></cube-spin></div>
        <div class="alert alert-success justify-content-center text-center" v-show="nothing">Nothing Found</div>
    </div>
</template>


<script>
import CubeSpin from 'vue-loading-spinner/src/components/Circle';
export default {
    components: {
        CubeSpin
    },
    data() {
        return {
            Name: null,
            Bedrooms: null,
            Bathrooms: null,
            Storeys: null,
            Garages: null,
            PriceMin: null,
            PriceMax: null,
            fields: [],
            errors: {},
            nothing: false,
            loading: false,
        }
    },
    mounted() {
        this.loading = true;
        axios.get('/api/houses').then(response => {
            this.fields = response.data;
            this.loading = false;
        }).catch(error => {
            if (error.response.status == 422) {
                this.errors = error.response.data.errors;
            }
            console.log('Error');
        });
    },
    methods: {
        submit() {
            this.loading = true;
            axios.get('/api/search',
                {
                    params:
                    {
                        Name: this.Name,
                        Bedrooms: this.Bedrooms,
                        Bathrooms: this.Bathrooms,
                        Storeys: this.Storeys,
                        Garages: this.Garages,
                        PriceMin: this.PriceMin,
                        PriceMax: this.PriceMax
                    }
                }
            ).then(response => {
                this.fields = response.data;
                this.loading = false;
                this.errors = {};
                if (response.status == 204) {
                    this.nothing = true;
                }else{
                    this.nothing = false;
                }

            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
                console.log('Error');
            });
        }
    }
}
</script>
