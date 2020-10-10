<template>
	<div class="container mt-4">

		<hr />
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Terlaris</h1>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<!-- single product -->
					<div
						v-for="shoes in heroProducts"
						v-bind:key="shoes.id"
						class="col-lg-3 col-md-6"
					>
						<a href="#">
							<div class="single-product">
								<img class="img-fluid" :src="shoes.image_url" alt="" />
								<div class="product-details">
									<h6>{{ shoes.name }}</h6>
									<p class="text-black-50">{{ shoes.brand_name }}</p>
									<div class="price text-right">
										<p class="l-through text-right">Rp {{ shoes.price }}</p>
										<p>Rp {{ shoes.promo_price }}</p>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<hr />
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Terbaru</h1>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<!-- single product -->
					<div
						v-for="shoes in newProducts"
						:key="shoes.id"
						class="col-lg-3 col-md-6"
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
			heroProducts: [],
			newProducts: [],
			productLimit: 10,
			formatIDR: ["price", "final_price", "promo_price"],
		};
	},
	created() {
		this.products = this.changeFormatToIDR(shoesJson, this.formatIDR);
		this.heroProducts = this.filterHero;
		this.newProducts = this.filterNew;
	},
	methods: {
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
	},
	computed: {
		filterHero() {
			let filteredShoes = this.products.filter(
				(products) => products.most_sold_product_color_id != null
			);
			filteredShoes = this.shuffle(filteredShoes).slice(0, this.productLimit);
			return filteredShoes;
		},
		filterNew() {
			let filteredShoes = this.products.sort(function (a, b) {
				var dateA = new Date(a.created_at).getTime();
				var dateB = new Date(b.created_at).getTime();
				return a.created_at - b.created_at;
			}).slice(0, this.productLimit);
			return filteredShoes;
		},
	},
};
</script>
