<template>
	<div class="container">
		<!--================Single Product Area =================-->
		<div class="product_image_area">
			<div class="container">
				<div class="row s_product_inner">
					<div class="col-lg-6">
						<div
							v-for="(variant, index) in product.variants"
							:key="index"
							class="s_Product_carousel"
							v-show="color_index == index"
						>
							<div
								v-for="image in variant.image_urls"
								:key="image"
								class="single-prd-item"
							>
								<img class="img-fluid" :src="image" alt="" />
							</div>
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="s_product_text">
							<h3>{{ product.name }}</h3>
							<h4 class="text-black-50">{{ product.brand_name }}</h4>
							<strike v-if="product.final_price == product.promo_price"
								>Rp. {{ product.price }}</strike
							>
							<h2>Rp. {{ product.final_price }}</h2>
							<ul class="list">
								<hr />
								<li>
									<p
										v-for="(color, index) in product.variants"
										:key="color.id"
										class="d-inline"
										@click="changeColorVariable(index, color.color.name)"
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
								</li>
								<hr />
								<li>
									<a href="#"><span>Warna</span> : {{ color_now }}</a>
								</li>
								<li>
									<a href="#"><span>Ukuran</span> : {{ size_now }}</a>
								</li>
								<li>
									<a href="#"><span>Stock</span> : {{ stock_now }}</a>
								</li>
								<br />
								<div
									v-for="(variant, index) in product.variants"
									:key="index"
									v-show="color_index == index"
								>
									<li class="filter-list">
										<button
											v-for="size in variant.sizes"
											:key="size.size"
											class="btn btn-outline-danger mr-1"
											@click="(size_now = size.size), (stock_now = size.stock)"
										>
											{{ size.size }}
										</button>
									</li>
								</div>
							</ul>
							<hr style="margin-top: 100px" />
							<div class="product_count">
								<label for="qty">Quantity:</label>
								<input
									type="number"
									min="0"
									:max="stock_now == '' ? 0 : stock_now"
									:value="stock_now - stock_now"
									class="input-text qty"
								/>
							</div>
							<div class="card_area d-flex align-items-center">
								<a class="primary-btn text-white disabled">Add to Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--================End Single Product Area =================-->

		<!--================Product Description Area =================-->
		<section class="product_description_area">
			<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a
							class="nav-link"
							id="home-tab"
							data-toggle="tab"
							href="#home"
							role="tab"
							aria-controls="home"
							aria-selected="true"
							>Deskripsi</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="profile-tab"
							data-toggle="tab"
							href="#profile"
							role="tab"
							aria-controls="profile"
							aria-selected="false"
							>Perawatan</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="contact-tab"
							data-toggle="tab"
							href="#contact"
							role="tab"
							aria-controls="contact"
							aria-selected="false"
							>Komentar</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link active"
							id="review-tab"
							data-toggle="tab"
							href="#review"
							role="tab"
							aria-controls="review"
							aria-selected="false"
							>Ulasan</a
						>
					</li>
				</ul>

				<div class="tab-content" id="myTabContent">
					<div
						class="tab-pane fade"
						id="home"
						role="tabpanel"
						aria-labelledby="home-tab"
					>
						<p v-html="product.description"></p>
					</div>

					<div
						class="tab-pane fade"
						id="profile"
						role="tabpanel"
						aria-labelledby="profile-tab"
					>
                    <p>{{ product.care_label }}</p>
					</div>

					<div
						class="tab-pane fade"
						id="contact"
						role="tabpanel"
						aria-labelledby="contact-tab"
					>
						<div class="row">
							<div class="col-lg-12">
								<div class="comment_list">
									<div class="review_item">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<h5>12th Feb, 2018 at 05:56 pm</h5>
												<a class="reply_btn">Reply</a>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
									<div class="review_item reply">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<h5>12th Feb, 2018 at 05:56 pm</h5>
												<a class="reply_btn">Reply</a>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
									<div class="review_item">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<h5>12th Feb, 2018 at 05:56 pm</h5>
												<a class="reply_btn">Reply</a>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div
						class="tab-pane fade show active"
						id="review"
						role="tabpanel"
						aria-labelledby="review-tab"
					>
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="row total_rate">
									<div class="col-12">
										<div class="box_total">
											<h5>Overall</h5>
											<h4>5.0</h4>
											<h6>(03 Reviews)</h6>
										</div>
									</div>
								</div>
								<br />
								<div class="review_list">
									<div class="review_item">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
									<div class="review_item">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
									<div class="review_item">
										<div class="media">
											<div class="media-body">
												<h4>Blake Ruiz</h4>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation
											ullamco laboris nisi ut aliquip ex ea commodo
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!--================End Product Description Area =================-->
	</div>
</template>

<script>
import shoesJson from "../json/products.json";
export default {
	data() {
		return {
			product_id: "",
			product: "",
			color_index: 0,
			color_now: "",
			size_now: "",
			stock_now: "",
			formatIDR: ["price", "final_price", "promo_price"],
		};
	},
	created() {
		this.refresh();
	},
	methods: {
		// Refresh rendering data
		refresh() {
			this.product_id = this.getProductId;
			this.product = shoesJson.filter(
				(shoes) => shoes.id == this.product_id
			)[0];
			this.product = this.changeFormatToIDR(this.product, this.formatIDR);
			this.color_now = this.product.variants[0].color.name;
		},

		// Change every variable when Color changed
		changeColorVariable(index, name) {
			this.color_index = index;
			this.color_now = name;
			this.size_now = "";
			this.stock_now = "";
		},

		// Change format to IDR -> Not Yet
		changeFormatToIDR(data, formatIDR) {
			for (var j in formatIDR) {
				data[formatIDR[j]] /= 1;
				// data[formatIDR[j]] = data[formatIDR[j]]
				// 	.toString()
				// 	.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
			}
			return data;
		},
	},
	computed: {
		// Get last parameter from URL
		getProductId() {
			var url = window.location.href.split("/");
			var lastSegment = url.pop() || url.pop();
			return lastSegment;
		},
	},
};
</script>
