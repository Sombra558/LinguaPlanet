<aside class="border-end gray-back" id="sidebar-wrapper">
  <ul class="list-group pt-3">
    <li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..home')) active @endif">
      <a class="sidebar-link d-flex" href="/admin">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  				<path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="{{ request()->routeIs('admin..home') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M9 22V12H15V22" stroke="{{ request()->routeIs('admin..home') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  			</svg>
    		<span class="ml-3 nav-label">Inicio</span>
      </a>
    </li>
    <li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..cursos')) active @endif">
      <a class="sidebar-link d-flex" href="/admin/cursos">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  				<path d="M2 3H8C9.06087 3 10.0783 3.42143 10.8284 4.17157C11.5786 4.92172 12 5.93913 12 7V21C12 20.2044 11.6839 19.4413 11.1213 18.8787C10.5587 18.3161 9.79565 18 9 18H2V3Z" stroke="{{ request()->routeIs('admin..cursos') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M22 3H16C14.9391 3 13.9217 3.42143 13.1716 4.17157C12.4214 4.92172 12 5.93913 12 7V21C12 20.2044 12.3161 19.4413 12.8787 18.8787C13.4413 18.3161 14.2044 18 15 18H22V3Z" stroke="{{ request()->routeIs('admin..cursos') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  			</svg>
    		<span class="ml-3 nav-label">Cursos</span>
      </a>
  	</li>
    <li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..cupones')) active @endif">
      <a class="sidebar-link d-flex" href="/admin/cupones">
      	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  				<path d="M20 12V22H4V12" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M22 7H2V12H22V7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M12 22V7" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M12 7H7.5C6.83696 7 6.20107 6.73661 5.73223 6.26777C5.26339 5.79893 5 5.16304 5 4.5C5 3.83696 5.26339 3.20107 5.73223 2.73223C6.20107 2.26339 6.83696 2 7.5 2C11 2 12 7 12 7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M12 7H16.5C17.163 7 17.7989 6.73661 18.2678 6.26777C18.7366 5.79893 19 5.16304 19 4.5C19 3.83696 18.7366 3.20107 18.2678 2.73223C17.7989 2.26339 17.163 2 16.5 2C13 2 12 7 12 7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  			</svg>
    		<span class="ml-3 nav-label">Cupones</span>
      </a>
  	</a>
  	<li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..membresias')) active @endif">
      <a class="sidebar-link d-flex" href="/admin/membresias">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  				<path d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z" stroke="{{ request()->routeIs('admin..membresias') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M1 10H23" stroke="{{ request()->routeIs('admin..membresias') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  			</svg>
  			<span class="ml-3 nav-label">Membresias</span>
      </a>
		</a>
		<li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..usuarios')) active @endif">
      <a class="sidebar-link d-flex" href="/admin/usuarios">
  			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  				<path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M23 21.0009V19.0009C22.9993 18.1146 22.7044 17.2536 22.1614 16.5532C21.6184 15.8527 20.8581 15.3524 20 15.1309" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  				<path d="M16 3.13086C16.8604 3.35116 17.623 3.85156 18.1676 4.55317C18.7122 5.25478 19.0078 6.11769 19.0078 7.00586C19.0078 7.89403 18.7122 8.75694 18.1676 9.45855C17.623 10.1602 16.8604 10.6606 16 10.8809" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  			</svg>
  			<span class="ml-3 nav-label">Usuarios</span>
      </a>
		</a>
    <li class="list-group-item border-0 my-3 sidebar-item @if(request()->routeIs('admin..configuraciones')) active @endif">
      <a class="sidebar-link d-flex" href="/admin/configuraciones">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62288L20.184 6.54279C19.6574 5.62887 18.4905 5.31359 17.5753 5.83798V5.83798C17.1397 6.09461 16.6198 6.16742 16.1305 6.04035C15.6411 5.91329 15.2224 5.59678 14.9666 5.16064C14.8021 4.88342 14.7137 4.56766 14.7103 4.24531V4.24531C14.7251 3.72849 14.5302 3.22767 14.1698 2.85694C13.8094 2.4862 13.3143 2.27713 12.7973 2.27734H11.5433C11.0367 2.27734 10.5511 2.47918 10.1938 2.83821C9.83644 3.19724 9.63693 3.68386 9.63937 4.19039V4.19039C9.62435 5.23619 8.77224 6.07608 7.72632 6.07597C7.40397 6.07262 7.08821 5.98421 6.81099 5.81968V5.81968C5.89582 5.29528 4.72887 5.61056 4.20229 6.52448L3.5341 7.62288C3.00817 8.53566 3.31916 9.70187 4.22975 10.2316V10.2316C4.82166 10.5733 5.18629 11.2049 5.18629 11.8883C5.18629 12.5718 4.82166 13.2033 4.22975 13.5451V13.5451C3.32031 14.0712 3.00898 15.2346 3.5341 16.1446V16.1446L4.16568 17.2339C4.4124 17.679 4.82636 18.0076 5.31595 18.1467C5.80554 18.2859 6.3304 18.2242 6.77438 17.9753V17.9753C7.21084 17.7206 7.73094 17.6508 8.2191 17.7815C8.70725 17.9121 9.12299 18.2323 9.37392 18.6709C9.53845 18.9482 9.62686 19.2639 9.63021 19.5863V19.5863C9.63021 20.6428 10.4867 21.4993 11.5433 21.4993H12.7973C13.8502 21.4993 14.7053 20.6484 14.7103 19.5954V19.5954C14.7079 19.0873 14.9086 18.5993 15.2679 18.24C15.6272 17.8807 16.1152 17.6799 16.6233 17.6824C16.9449 17.691 17.2594 17.779 17.5387 17.9387V17.9387C18.4515 18.4646 19.6177 18.1536 20.1474 17.243V17.243L20.8064 16.1446C21.0615 15.7068 21.1315 15.1853 21.001 14.6956C20.8704 14.206 20.55 13.7886 20.1108 13.5359V13.5359C19.6715 13.2832 19.3511 12.8658 19.2206 12.3762C19.09 11.8866 19.16 11.3651 19.4151 10.9272C19.581 10.6376 19.8211 10.3975 20.1108 10.2316V10.2316C21.0159 9.70216 21.3262 8.54276 20.8064 7.63203V7.63203V7.62288Z" stroke="{{ request()->routeIs('admin..configuraciones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="12.1747" cy="11.8881" r="2.63616" stroke="{{ request()->routeIs('admin..configuraciones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="ml-3 nav-label">Configuraciones</span>
      </a>
    </a>
  </ul>
</aside>