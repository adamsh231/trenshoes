<template>
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<button
					data-toggle="modal"
					data-target="#modal_add_product"
					class="btn btn-success btn-icon-split float-right"
				>
					<span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span>
					<span class="text">Tambah Produk</span>
				</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table
						class="table table-bordered"
						id="dataTable"
						width="100%"
						cellspacing="0"
					>
						<thead>
							<tr>
								<th class="text-center">Nama</th>
								<th class="text-center">Merek</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Harga Promo</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product, index) in products" :key="product.id">
								<td>{{ product.name }}</td>
								<td>{{ product.brand.name }}</td>
								<td class="text-center">{{ product.price }}</td>
								<td class="text-center">{{ product.promo_price }}</td>
								<td class="text-center">
									<a
										@click="fillEditProduct(index)"
										:id="'edit' + product.id"
										class="btn btn-primary btn-circle btn-sm text-white"
									>
										<i class="fas fa-edit"></i>
									</a>
									<a
										@click="deleteProduct(product.id)"
										:id="'delete' + product.id"
										class="btn btn-danger btn-circle btn-sm text-white"
									>
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			products: [],
		};
	},
	created() {
		this.fetchProduct();
	},
	mounted() {
		$("#button_add_product").click(this.addProduct);
		$("#button_edit_product").click(this.editProduct);
	},
	methods: {
		fetchProduct() {
			axios
				.get("/admin/product")
				.then((response) => {
					this.products = response.data;
				})
				.catch((error) => {
					console.log(error.message);
				});
		},
		addProduct() {
			$("#button_add_product").prop("disabled", true);
			const vm = this;
			axios
				.post("/admin/product", {
					name: $("#input_name_add").val(),
					brand: $("#input_brand_add").val(),
					price: $("#input_price_add").val(),
				})
				.then(function (response) {
					$("#button_add_product").prop("disabled", false);
					$("#modal_add_product").modal("hide");
					Swal.fire("Success!", "Data has been added!", "success");
					vm.fetchProduct();
				})
				.catch(function (error) {
					$("#button_add_product").prop("disabled", false);
					Swal.fire(
						"Failed!",
						"Incomplete data or Inconsistent Connection!",
						"error"
					);
				});
		},
		deleteProduct(id) {
			$("#delete" + id).addClass("disabled");
			const vm = this;
			axios
				.post("/admin/product/" + id)
				.then((response) => {
					Swal.fire("Success!", "Data has been deleted!", "success");
					vm.fetchProduct();
				})
				.catch((error) => {
					$("#button_add_product").prop("disabled", false);
					Swal.fire("Failed!", "Inconsistent Connection!", "error");
					$("#product" + id).removeClass("disabled");
				});
		},
		fillEditProduct(index) {
            $('#modal_edit_product').modal('show');
			$("#input_name_edit").val(this.products[index].name);
			$("#input_brand_edit").val(this.products[index].brand.id);
			$("#input_price_edit").val(this.products[index].price);
			$("#input_id_edit").val(this.products[index].id);
        },
        editProduct(){
			var id = $("#input_id_edit").val();
            $("#button_edit_product").prop("disabled", true);
			const vm = this;
			axios
				.post("/admin/product/"+id+"/edit", {
					name: $("#input_name_edit").val(),
					brand: $("#input_brand_edit").val(),
					price: $("#input_price_edit").val(),
				})
				.then(function (response) {
					$("#button_edit_product").prop("disabled", false);
					$("#modal_edit_product").modal("hide");
					Swal.fire("Success!", "Data has been edited!", "success");
					vm.fetchProduct();
				})
				.catch(function (error) {
					$("#button_edit_product").prop("disabled", false);
					Swal.fire(
						"Failed!",
						"Incomplete data or Inconsistent Connection!",
						"error"
					);
				});
        }
	},
};
</script>
