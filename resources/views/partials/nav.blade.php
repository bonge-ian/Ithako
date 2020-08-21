<header
	uk-sticky="sel-target: .uk-navbar; cls-active: uk-navbar-sticky;animation: uk-animation-slide-top;show-on-up: true"
	class="uk-box-shadow-large uk-sticky" id="header">
	<div class="uk-navbar-container ">
		<nav class="uk-container uk-container-large uk-visible@s uk-navbar"
			uk-navbar="align: left; boundary: !.uk-navbar-container">
			<div class="uk-navbar-left">
				<a class="uk-navbar-item uk-logo" href="{{ route('games.index') }}">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172"
						style=" fill:#000000;">
						<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
							stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
							font-family="none" font-weight="none" font-size="none" text-anchor="none"
							style="mix-blend-mode: normal">
							<path d="M0,172v-172h172v172z" fill="none"></path>
							<g>
								<path
									d="M145.24325,45.62658c-1.22908,19.89467 -8.05533,33.54717 -27.33725,36.07342l-8.66808,-1.161c-1.53725,-6.69008 -5.90533,-12.28725 -11.77483,-15.52658l6.55392,-48.39292c16.99575,4.40392 31.56917,14.878 41.22625,29.00708zM64.36383,96.06917c-2.25392,6.99467 -6.58617,10.40958 -9.07658,10.40958c-16.55142,0 -27.30142,0 -40.71383,-14.6415c-0.172,-1.9135 -0.24008,-3.85925 -0.24008,-5.83725c0,-0.37625 0,-0.71667 0.03583,-1.09292l48.39292,6.55392c0.37267,1.60175 0.88508,3.139 1.60175,4.60817zM87.09292,14.36917l-6.55392,48.39292c-6.69008,1.53725 -12.28725,5.90533 -15.52658,11.77483l-48.39292,-6.5575c7.98725,-30.84892 36.00533,-53.64608 69.3805,-53.64608c0.37625,0 0.71667,0 1.09292,0.03583z"
									fill="#4c4c6a"></path>
								<g fill="#34c6b0">
									<path
										d="M74.53333,106.98758l-6.55392,48.39292c-29.04292,-7.50708 -50.91917,-32.76242 -53.40958,-63.54325c11.80708,2.83083 25.86808,4.40392 42.4195,4.40392c2.49042,0 4.94858,-0.06808 7.37092,-0.172c2.11775,4.64042 5.70108,8.46025 10.17308,10.91842zM155.3805,104.02058c-7.98725,30.84892 -36.00533,53.64608 -69.3805,53.64608c-0.37625,0 -0.71667,0 -1.09292,-0.03583l6.55392,-48.39292c6.69008,-1.53725 12.28725,-5.90533 15.52658,-11.77483zM157.66667,86c0,0.37625 0,0.71667 -0.03583,1.09292l-39.72125,-5.39292c13.78867,-8.46383 23.30958,-20.57908 27.33725,-36.07342c7.8475,11.5025 12.41983,25.3915 12.41983,40.37342z">
									</path>
								</g>
							</g>
						</g>
					</svg>
				</a>
				<ul class="uk-navbar-nav">
					<li class="{{ request()->routeIs('pages.games') ? 'uk-active' : ''}} ">
						<a href="{{ route('pages.games') }}">Games</a>
					</li>
					<li class="{{ request()->routeIs('pages.coming-soon') ? 'uk-active'  : '' }}"><a
							href="{{ route('pages.coming-soon') }}">Coming Soon</a></li>
					<li class=""><a href="#">Top 50</a></li>
				</ul>
			</div>
			<div class="uk-navbar-right">
				<div class="uk-navbar-item">
					<livewire:search></livewire:search>
				</div>
			</div>
		</nav>

		<nav class='uk-container uk-hidden@s uk-flex uk-flex-middle uk-flex-column bb-grey uk-nav' uk-nav>
			<div class="uk-flex uk-flex-column uk-flex-middle">
				<a class="uk-navbar-item uk-logo" href="{{ route('games.index') }}">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172"
						style=" fill:#000000;">
						<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
							stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
							font-family="none" font-weight="none" font-size="none" text-anchor="none"
							style="mix-blend-mode: normal">
							<path d="M0,172v-172h172v172z" fill="none"></path>
							<g>
								<path
									d="M145.24325,45.62658c-1.22908,19.89467 -8.05533,33.54717 -27.33725,36.07342l-8.66808,-1.161c-1.53725,-6.69008 -5.90533,-12.28725 -11.77483,-15.52658l6.55392,-48.39292c16.99575,4.40392 31.56917,14.878 41.22625,29.00708zM64.36383,96.06917c-2.25392,6.99467 -6.58617,10.40958 -9.07658,10.40958c-16.55142,0 -27.30142,0 -40.71383,-14.6415c-0.172,-1.9135 -0.24008,-3.85925 -0.24008,-5.83725c0,-0.37625 0,-0.71667 0.03583,-1.09292l48.39292,6.55392c0.37267,1.60175 0.88508,3.139 1.60175,4.60817zM87.09292,14.36917l-6.55392,48.39292c-6.69008,1.53725 -12.28725,5.90533 -15.52658,11.77483l-48.39292,-6.5575c7.98725,-30.84892 36.00533,-53.64608 69.3805,-53.64608c0.37625,0 0.71667,0 1.09292,0.03583z"
									fill="#4c4c6a"></path>
								<g fill="#34c6b0">
									<path
										d="M74.53333,106.98758l-6.55392,48.39292c-29.04292,-7.50708 -50.91917,-32.76242 -53.40958,-63.54325c11.80708,2.83083 25.86808,4.40392 42.4195,4.40392c2.49042,0 4.94858,-0.06808 7.37092,-0.172c2.11775,4.64042 5.70108,8.46025 10.17308,10.91842zM155.3805,104.02058c-7.98725,30.84892 -36.00533,53.64608 -69.3805,53.64608c-0.37625,0 -0.71667,0 -1.09292,-0.03583l6.55392,-48.39292c6.69008,-1.53725 12.28725,-5.90533 15.52658,-11.77483zM157.66667,86c0,0.37625 0,0.71667 -0.03583,1.09292l-39.72125,-5.39292c13.78867,-8.46383 23.30958,-20.57908 27.33725,-36.07342c7.8475,11.5025 12.41983,25.3915 12.41983,40.37342z">
									</path>
								</g>
							</g>
						</g>
					</svg>
				</a>
				<ul class=" uk-flex uk-navbar-nav">
					<li class="{{ request()->routeIs('pages.games') ? 'uk-active'  : '' }}">
						<a href="{{ route('pages.games') }}">Games</a>
					</li>
					<li class="{{ request()->routeIs('pages.coming-soon') ? 'uk-active'  : '' }}"><a
							href="{{ route('pages.coming-soon') }}">Coming Soon</a></li>
					<li><a href="#">Top 50</a></li>
				</ul>
			</div>
			<div class="uk-panel">
				<div class="uk-navbar-item">
					<livewire:search></livewire:search>
				</div>
			</div>
		</nav>
	</div>

</header>
