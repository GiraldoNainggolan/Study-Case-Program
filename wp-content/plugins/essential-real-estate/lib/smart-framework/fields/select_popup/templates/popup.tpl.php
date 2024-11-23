<script type="text/html" id="tmpl-gsf-select-popup">
	<div id="gsf-popup-select-target">
		<div class="gsf-popup-select-wrapper g5u-popup-container">
			<div class="g5u-popup gsf-popup-select-content"
			<# if (data.popup_width) { #>
			style="width: {{data.popup_width}}"
			<# } #>>
				<h4 class="g5u-popup-header">
					<strong>{{data.title}}</strong>
				</h4>
				<div class="g5u-popup-body gsf-popup-select-listing">
					<div class="gsf-row">
						<# for (var item_key in data.options) { #>
						<div class="gsf-col gsf-col-{{12/(data.items)}}">
							<div class="gsf-popup-select-item" data-value="{{item_key}}">
								<img src="{{ data.options[item_key].img}}"
								     data-thumb="{{ data.options[item_key].thumb}}"
								     alt="{{ data.options[item_key].label}}">
								<div class="gsf-popup-select-item-footer">
									<span class="name">{{data.options[item_key].label}}</span>
									<span class="current"><?php esc_html_e('Current','smart-framework') ?></span>
								</div>
							</div>
						</div>
						<# }; #>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>