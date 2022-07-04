<div id="sidebar-content">
	<!--=== Navigation ===-->
	<ul id="nav">
		<li class="current">
			<a href="{{ route('admin_dashboard') }}">
				<i class="icon-dashboard"></i>
				Dashboard
			</a>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Tenders
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('admin.tender.create') }}">
						<i class="icon-angle-right"></i>
						Add New Tender
					</a>
				</li>
				<li>
					<a href="{{ route('admin.tender.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>

				<li>
					<a href="{{ route('corrigendum_tender.create') }}">
					<i class="icon-angle-right"></i>
					Add Corrigendum
					</a>
				</li>

				<li>
					<a href="{{ route('admin.post_tender.create') }}">
						<i class="icon-angle-right"></i>
						Add Post Tender
					</a>
				</li>

				<li>
					<a href="{{ route('admin.post_tender.view_all') }}">
						<i class="icon-angle-right"></i>
						View All Post Tender
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Departments
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('department.create') }}">
						<i class="icon-angle-right"></i>
						Create
					</a>
				</li>
				<li>
					<a href="{{ route('department.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Tender Types
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('tender_type.create') }}">
						<i class="icon-angle-right"></i>
						Create
					</a>
				</li>
				<li>
					<a href="{{ route('tender_type.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);">
				<i class="icon-desktop"></i>
				Department Users
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{ route('user.create') }}">
					<i class="icon-angle-right"></i>
					Add
					</a>
				</li>
				<li>
					<a href="{{ route('user.index') }}">
					<i class="icon-angle-right"></i>
					View All
					</a>
				</li>
			</ul>
		</li>
	</ul>

</div>