<?php  
class ControllerExtensionModuleProscroller extends Controller {
	
	protected $path = array();
	
	public function index($setting) {
		static $module = 0;
		$this->language->load('extension/module/proscroller');
		$this->load->model('catalog/category');
		
		// $this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
		// $this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
		// $this->document->addStyle('catalog/view/theme/default/stylesheet/proscroller.css');
		
		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
		} else {
			$category = $this->model_catalog_category->getCategory($setting['category_id']);
			if (isset($category['name'])) {
				$data['heading_title'] = $category['name'];
			} else {
				$data['heading_title'] = $this->language->get('heading_title');
			}
		}
		
    	$data['button_cart'] = $this->language->get('button_cart');
    	$data['button_cart'] = $this->language->get('button_cart');
    	$data['button_wishlist'] = $this->language->get('button_wishlist');
    	$data['button_compare'] = $this->language->get('button_compare');
		$data['text_tax'] = $this->language->get('text_tax');
		
    	$data['title_link'] = $setting['title_link'] == "" ? null: $setting['title_link'];
    	$data['visible'] = $setting['visible'];
    	$data['shownav'] = $setting['shownav'];
    	$data['sort'] = $setting['sort'];
		$data['type'] = "wrap: 'last'";
		if ($setting['autoscroll'] > 0) {
		$data['autoscroll'] = $setting['autoscroll'];}
			else {$data['autoscroll'] = '0';}
		if ($setting['animationspeed'] > 0) {
		$data['animationspeed'] = $setting['animationspeed'];}
			else {$data['animationspeed'] = '1000';}
		$data['hoverpause'] = $setting['hoverpause'];
			
		$data['show_title'] = $setting['show_title'];
		$data['show_desc'] = $setting['show_desc'];
		$data['show_price'] = $setting['show_price'];
		$data['show_rate'] = $setting['show_rate'];
		$data['show_cart'] = $setting['show_cart'];
		$data['show_wish'] = $setting['show_wish'];
		$data['show_compare'] = $setting['show_compare'];
		
		$butCount = 0;
		if($setting['show_cart'])
			$butCount++;
		if($setting['show_wish'])
			$butCount++;
		if($setting['show_compare'])
			$butCount++;
		$data['butCount'] = $butCount;
		
		switch($butCount) {
			case 1:$data['butWidth'] = 100;break;
			case 2:$data['butWidth'] = 50;break;
			case 3:$data['butWidth'] = 33.3;break;
			default: $data['butWidth'] = 0;break;
		}
		
		if ($setting['desc_word'] >= 300) {
			$data['dHeight'] = 160;
		} else if ($setting['desc_word'] >= 200){
			$data['dHeight'] = 115;
		} else if ($setting['desc_word'] >= 100){
			$data['dHeight'] = 65;
		} else {
			$data['dHeight'] = 45;
		}
			
		$this->load->model('extension/module/proscroller');
		
		$this->load->model('tool/image');
		
		if (isset($this->request->get['path'])) {
			$this->path = explode('_', $this->request->get['path']);
			
			$this->category_id = end($this->path);
		}
		$url = '';

        $data['products'] = array();
			
		if ($setting['category_id'] == 'featured') {
			$data['products'] = $this->getfeaturedproducts($setting);
		} else {
			$data['products'] = $this->getcategoryproducts($setting);
		}
						
		$data['module'] = $module++;
		
		return $this->load->view('extension/module/proscroller', $data);
  	}
	
	public function getcategoryproducts($setting){
	
	$data = array(
				'filter_category_id'  => $setting['category_id'], 
				'filter_manufacturer_id'  => $setting['manufacturer_id'], 
				'filter_sub_category' => true, 
				'sort'                => $setting['sort'],
				'order'               => 'DESC',
				'start'               => '0',
				'limit'               => $setting['count']
			);
	
			$products = $this->model_extension_module_proscroller->getProducts($data);
					
					foreach ($products as $product) {
						if ($product['image']) {
							$image = $product['image'];
						} else {
							$image = 'placeholder.png';
						}
						
						if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
							$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
						} else {
							$price = false;
						}
								
						if ((float)$product['special']) {
							$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
						} else {
							$special = false;
						}
					
						if ($this->config->get('config_tax')) {
							$tax = $this->currency->format((float)$product['special'] ? $product['special'] : $product['price'], $this->session->data['currency']);
						} else {
							$tax = false;
						}
						
						if ($this->config->get('config_review_status')) {
							$rating = (int)$product['rating'];
						} else {
							$rating = false;
						}
						
						$data['products'][] = array(
							'product_id'      => $product['product_id'],
							'name'    => $product['name'],
							'desc' => utf8_substr(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8')), 0, $setting['desc_word']) . '..',
							'model'   => $product['model'],
							'qty'     => $product['quantity'],
							'rating'  => $rating,
							'reviews' => sprintf($this->language->get('text_reviews'), (int)$product['reviews']),
							'thumb'   => $this->model_tool_image->resize($image, $setting['image_width'], $setting['image_height']),
							'price'   => $price,
							'tax'   => $tax,
							'special' => $special,
							'href'    => $this->url->link('product/product', 'product_id=' . $product['product_id']),
						);
					}
					
		return $data['products'];
	}
	
	public function getfeaturedproducts($setting){
		
	$this->load->model('catalog/product');
		if (empty($setting['count'])) {
			$setting['count'] = 5;
		}
		
		// $products = array_slice($products, 0, (int)$setting['count']);
		$products = array_slice($setting['product'], 0, (int)$setting['count']);
		
		foreach ($products as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {
				if ($product_info['image']) {
					$image = $this->model_tool_image->resize($product_info['image'], $setting['image_width'], $setting['image_height']);
				} else {
					$image = false;
				}

				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}
						
				if ((float)$product_info['special']) {
					$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}
				
				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}
				
				if ($this->config->get('config_review_status')) {
					$rating = $product_info['rating'];
				} else {
					$rating = false;
				}
					
				$data['products'][] = array(
					'product_id' => $product_info['product_id'],
					'thumb'   	 => $image,
					'name'    	 => $product_info['name'],
					'desc' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $setting['desc_word']) . '..',
					'price'   	 => $price,
					'qty'     => $product_info['quantity'],
					'special' 	 => $special,
					'tax' 	 => $tax,
					'rating'     => $rating,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
				);
			}
		}
		return $data['products'];
	}
	
	
	
}
?>