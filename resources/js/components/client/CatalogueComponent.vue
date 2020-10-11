<template>
	<div class="container mt-4">
		<div class="row">
			<!-- Filter -->
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Filter Produk</div>

					<!-- Kategori -->
					<div class="common-filter">
						<div class="head">Kategori</div>
						<div style="overflow: auto; height: 200px">
							<form action="#">
								<ul>
									<li
										v-for="category in categories"
										:key="category"
										class="filter-list"
									>
										<input
											@change="filteredProduct()"
											class="pixel-radio"
											type="checkbox"
											:id="category"
											name="category"
											:value="category"
											v-model="filter_category"
										/><label :for="category">{{ category }}</label>
									</li>
								</ul>
							</form>
						</div>
					</div>
					<!-- -------- -->

					<!-- Brand -->
					<div class="common-filter">
						<div class="head">Merek</div>
						<div style="overflow: auto; height: 200px">
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
					</div>
					<!-- ----- -->

					<!-- Size -->
					<div class="common-filter">
						<div class="head">Ukuran</div>
						<div style="overflow: auto; height: 200px">
							<form action="#">
								<ul>
									<li v-for="size in sizes" :key="size" class="filter-list">
										<input
											class="pixel-radio"
											type="checkbox"
											:id="size"
											:value="size"
											v-model="filter_size"
											@change="filteredProduct()"
										/><label :for="size">{{ size }}</label>
									</li>
								</ul>
							</form>
						</div>
					</div>
					<!-- ----- -->

					<!-- Color -->
					<div class="common-filter">
						<div class="head">Warna</div>
						<div style="overflow: auto; height: 200px">
							<form action="#">
								<ul>
									<li
										v-for="color in colors"
										:key="color.id"
										class="filter-list"
									>
										<input
											@change="filteredProduct()"
											class="pixel-radio"
											type="checkbox"
											:id="color.id"
											name="color"
											:value="color.id"
											v-model="filter_color"
										/><label :for="color.id">
											<span
												class="btn-sm btn-outline-light"
												:style="
													'background-color:' +
													color.rgb +
													'; border-radius: 15px; border: 1px solid black'
												"
												>{{ color.name }}</span
											>
										</label>
									</li>
								</ul>
							</form>
						</div>
					</div>
					<!-- ----- -->

                    <!-- Price -->
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
                    <!-- ----- -->

				</div>
			</div>
			<!-- ------ -->

			<!-- Produk -->
			<div class="col-xl-9 col-lg-8 col-md-7">
				<div class="input-group" style="margin-top: 50px">
					<input
						type="text"
						class="form-control text-center"
						placeholder="Cari Nama Produk"
						onfocus="this.placeholder = ''"
						onblur="this.placeholder = 'Cari Nama Produk'"
						v-model="filter_name"
						@input="filteredProduct()"
					/>
				</div>

				<!-- produk -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- Produk -->
						<div
							v-for="shoes in products"
							:key="shoes.id"
							class="col-lg-4 col-md-6"
						>
							<div class="single-product">
								<img
									class="img-fluid"
									:src="shoes.image_url"
									alt=""
									:id="'image' + shoes.id"
								/>
								<div class="product-details">
									<a href="#" class="mb-0">
										<h6>{{ shoes.name }}</h6>
										<p class="text-black-50">{{ shoes.brand_name }}</p>
										<div class="price">
											<small class="l-through text-right"
												>Rp {{ shoes.price }}</small
											>
											<p class="text-right">Rp {{ shoes.promo_price }}</p>
										</div>
									</a>
									<hr />
									<p
										v-for="color in shoes.variants"
										:key="color.id"
										class="d-inline"
										@click="
											changeImage('image' + shoes.id, color.thumbnail_urls[0])
										"
									>
										<button
											class="btn-sm btn-outline-light"
											:style="
												'background-color:' +
												color.color.rgb +
												'; border-radius: 15px; border: 1px solid black; cursor: pointer'
											"
										>
											{{ color.color.name }}
										</button>
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- ------ -->

				<!-- pagination -->
				<div
					class="filter-bar d-flex flex-wrap align-items-center justify-content-center"
				>
					<div class="pagination">
						<a href="#">1</a>
					</div>
				</div>
				<!-- ---------- -->
			</div>
			<!-- ------ -->
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
			sizes: [],
			colors: [],
			formatIDR: ["price", "final_price", "promo_price"],
			filter_category: [],
			filter_color: [],
			filter_brand: [],
			filter_size: [],
			filter_name: "",
		};
	},
	created() {
		this.refresh();
		this.categories = this.collectCategories;
		this.brands = this.collectBrands;
		this.sizes = this.collectSizes;
		this.colors = this.collectColor;
	},
	methods: {
		// Refresh rendering data
		refresh() {
			this.products = this.changeFormatToIDR(shoesJson, this.formatIDR);
			this.products = this.shuffle(this.products);
		},

		// Shuffle Array Data
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

		// Remove duplicate object by property
		removeDuplicates(data, prop) {
			return data.filter((obj, pos, arr) => {
				return arr.map((mapObj) => mapObj[prop]).indexOf(obj[prop]) === pos;
			});
		},

		// Change format to IDR -> Not Yet
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

		// Render Filtered Product
		filteredProduct() {
			this.refresh();

			// Name Filter
			if (this.filter_name != "") {
				this.products = this.products.filter((product) => {
					return product.name
						.toLowerCase()
						.includes(this.filter_name.toLowerCase());
				});
			}

			// Category Filter -> Filter if doesn't know the id of Category
			if (this.filter_category.length != 0) {
				var arr_concat = [];

				for (var i in this.filter_category) {
					var concat = this.products.filter(
						(products) =>
							Object.values(products.categories).indexOf(
								this.filter_category[i]
							) > -1
					);
					arr_concat = arr_concat.concat(concat);
				}
				this.products = this.removeDuplicates(arr_concat, "id");
			}

			// Brand Filter -> concat in case product just have (only one brand)
			if (this.filter_brand.length != 0) {
				var arr_concat = [];
				for (var i in this.filter_brand) {
					var concat = this.products.filter(
						(products) => products.brand_name == this.filter_brand[i]
					);
					arr_concat = arr_concat.concat(concat);
				}
				this.products = arr_concat;
			}

			// Size Filter -> concat with removed duplicate & Nested filter with some
			if (this.filter_size.length != 0) {
				var arr_concat = [];
				for (var i in this.filter_size) {
					var concat = this.products.filter((product) => {
						var variants = product.variants.some(({ sizes }) =>
							sizes.some(({ size }) => size == this.filter_size[i])
						);
						return variants;
					});
					arr_concat = arr_concat.concat(concat);
				}
				this.products = this.removeDuplicates(arr_concat, "id");
			}

			// Color Filter
			if (this.filter_color.length != 0) {
				var arr_concat = [];

				for (var i in this.filter_color) {
					var concat = this.products.filter((product) =>
						product.variants.some(
							({ color_id }) => color_id == this.filter_color[i]
						)
					);
					arr_concat = arr_concat.concat(concat);
				}
				this.products = this.removeDuplicates(arr_concat, "id");
			}
		},

		// Change image with another color
		changeImage(id, src) {
			$("#" + id).attr("src", src);
		},
	},
	computed: {
		// Collect all Unique Categories Name
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

		// Collect all Unique Brands Name
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

		// Collect all Unique Size
		collectSizes() {
			var size = [];
			for (var i in this.products) {
				for (var j in this.products[i].variants) {
					for (var k in this.products[i].variants[j].sizes) {
						size.push(this.products[i].variants[j].sizes[k].size);
					}
				}
			}
			size = size.filter((value, index, self) => self.indexOf(value) === index);
			size = size.sort();
			return size;
		},

		// Collect all Unique Color
		collectColor() {
			var color = [];
			for (var i in this.products) {
				for (var j in this.products[i].variants) {
					color.push(this.products[i].variants[j].color);
				}
			}
			color = this.removeDuplicates(color, "name").sort(function (a, b) {
				const nameA = a.name.toUpperCase();
				const nameB = b.name.toUpperCase();
				let comparison = 0;
				if (nameA > nameB) {
					comparison = 1;
				} else if (nameA < nameB) {
					comparison = -1;
				}
				return comparison;
			});
			return color;
		},
	},
};
</script>
