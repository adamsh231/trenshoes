<template>
	<div class="container mt-4">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Filter Produk</div>
					<div class="common-filter">
						<div class="head">Kategori</div>
						<form action="#">
							<ul>
								<li class="filter-list">
									<input
										@change="changeCategory('all')"
										class="pixel-radio"
										type="radio"
										id="all"
										name="brand"
									/><label for="all">Semua Kategori</label>
								</li>
								<li
									v-for="category in categories"
									:key="category"
									class="filter-list"
								>
									<input
										@change="changeCategory(category)"
										class="pixel-radio"
										type="radio"
										:id="category"
										name="brand"
									/><label :for="category">{{ category }}</label>
								</li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Brands</div>
						<form action="#">
							<ul>
								<li v-for="brand in brands" :key="brand" class="filter-list">
									<input
										class="pixel-radio"
										type="checkbox"
										:id="brand"
										:value="brand"
										v-model="filter_brand"
										@change="filteredProduct()"
									/><label :for="brand">{{ brand }}</label>
								</li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Color</div>
						<form action="#">
							<ul>
								<li class="filter-list">
									<input
										class="pixel-radio"
										type="radio"
										id="black"
										name="color"
									/><label for="black">Black<span>(29)</span></label>
								</li>
								<li class="filter-list">
									<input
										class="pixel-radio"
										type="radio"
										id="balckleather"
										name="color"
									/><label for="balckleather"
										>Black Leather<span>(29)</span></label
									>
								</li>
								<li class="filter-list">
									<input
										class="pixel-radio"
										type="radio"
										id="blackred"
										name="color"
									/><label for="blackred"
										>Black with red<span>(19)</span></label
									>
								</li>
								<li class="filter-list">
									<input
										class="pixel-radio"
										type="radio"
										id="gold"
										name="color"
									/><label for="gold">Gold<span>(19)</span></label>
								</li>
								<li class="filter-list">
									<input
										class="pixel-radio"
										type="radio"
										id="spacegrey"
										name="color"
									/><label for="spacegrey">Spacegrey<span>(19)</span></label>
								</li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<div
							v-for="shoes in products"
							:key="shoes.id"
							class="col-lg-4 col-md-6"
						>
							<a href="#">
								<div class="single-product">
									<img class="img-fluid" :src="shoes.image_url" alt="" />
									<div class="product-details">
										<h6>{{ shoes.name }}</h6>
										<p class="text-black-50">{{ shoes.brand_name }}</p>
										<div class="price">
											<p class="l-through text-right">Rp {{ shoes.price }}</p>
											<p class="text-right">Rp {{ shoes.promo_price }}</p>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div
					class="filter-bar d-flex flex-wrap align-items-center justify-content-center"
				>
					<div class="pagination">
						<a href="#">1</a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
</template>

<script>
import shoesJson from "../json/products.json";
export default {
	data() {
		return {
			products: [],
			categories: [],
			brands: [],
			formatIDR: ["price", "final_price", "promo_price"],
			filter_category: "all",
			filter_brand: [],
		};
	},
	created() {
		this.refresh();
		this.categories = this.collectCategories;
		this.brands = this.collectBrands;
	},
	methods: {
		refresh() {
			this.products = this.changeFormatToIDR(shoesJson, this.formatIDR);
			this.products = this.shuffle(this.products);
		},
		shuffle(data) {
			var ctr = data.length,
				temp,
				index;
			while (ctr > 0) {
				index = Math.floor(Math.random() * ctr);
				ctr--;
				temp = data[ctr];
				data[ctr] = data[index];
				data[index] = temp;
			}
			return data;
		},
		changeFormatToIDR(data, formatIDR) {
			for (var i in data) {
				for (var j in formatIDR) {
					data[i][formatIDR[j]] /= 1;

					//TODO: Rekursive data wont refresh
					// data[i][formatIDR[j]] = data[i][formatIDR[j]]
					// 	.toString()
					// 	.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
				}
			}
			return data;
		},
		changeCategory(category = "all") {
			this.filter_category = category;
			this.filteredProduct();
		},
		filteredProduct() {
			this.refresh();
			if (this.filter_category != "all") {
				this.products = this.products.filter(
					(products) =>
						Object.values(products.categories).indexOf(this.filter_category) >
						-1
				);
			}
			if (this.filter_brand.length != 0) {
                var arr_concat = [];
				for (var i in this.filter_brand) {
					var concat = this.products.filter(
						(products) => products.brand_name == this.filter_brand[i]
                    );
                    arr_concat = arr_concat.concat(concat)
                }
                this.products = arr_concat;
			}
		},
	},
	computed: {
		collectCategories() {
			var category = [];
			for (var i in this.products) {
				for (var j in this.products[i].categories) {
					category.push(this.products[i].categories[j]);
				}
			}
			category = category.filter(
				(value, index, self) => self.indexOf(value) === index
			);
			category = category.sort();
			return category;
		},
		collectBrands() {
			var brand = [];
			for (var i in this.products) {
				brand.push(this.products[i].brand_name);
			}
			brand = brand.filter(
				(value, index, self) => self.indexOf(value) === index
			);
			brand = brand.sort();
			return brand;
		},
	},
};
</script>
