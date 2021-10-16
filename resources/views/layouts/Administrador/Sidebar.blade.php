<aside class="border-end gray-back" id="sidebar-wrapper">
    <div class="list-group list-group-flush pl-5 pr-5 pt-3">
        <a href="/admin" class="my-3 sidebar-item @if(request()->routeIs('admin..home')) active @endif">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="{{ request()->routeIs('admin..home') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M9 22V12H15V22" stroke="{{ request()->routeIs('admin..home') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
    		<span class="ml-3 nav-label"> Inicio </span>
    	</a>
        <a href="/admin/cursos" class="my-3 sidebar-item @if(request()->routeIs('admin..cursos')) active @endif">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 3H8C9.06087 3 10.0783 3.42143 10.8284 4.17157C11.5786 4.92172 12 5.93913 12 7V21C12 20.2044 11.6839 19.4413 11.1213 18.8787C10.5587 18.3161 9.79565 18 9 18H2V3Z" stroke="{{ request()->routeIs('admin..cursos') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M22 3H16C14.9391 3 13.9217 3.42143 13.1716 4.17157C12.4214 4.92172 12 5.93913 12 7V21C12 20.2044 12.3161 19.4413 12.8787 18.8787C13.4413 18.3161 14.2044 18 15 18H22V3Z" stroke="{{ request()->routeIs('admin..cursos') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
    		<span class="ml-3 nav-label">Cursos</span>
    	</a>
        <a href="/admin/cupones" class="my-3 sidebar-item @if(request()->routeIs('admin..cupones')) active @endif">
        	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M20 12V22H4V12" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M22 7H2V12H22V7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M12 22V7" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M12 7H7.5C6.83696 7 6.20107 6.73661 5.73223 6.26777C5.26339 5.79893 5 5.16304 5 4.5C5 3.83696 5.26339 3.20107 5.73223 2.73223C6.20107 2.26339 6.83696 2 7.5 2C11 2 12 7 12 7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M12 7H16.5C17.163 7 17.7989 6.73661 18.2678 6.26777C18.7366 5.79893 19 5.16304 19 4.5C19 3.83696 18.7366 3.20107 18.2678 2.73223C17.7989 2.26339 17.163 2 16.5 2C13 2 12 7 12 7Z" stroke="{{ request()->routeIs('admin..cupones') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
    		<span class="ml-3 nav-label">Cupones</span>
    	</a>
    	<a href="/admin/membresias" class="my-3 sidebar-item @if(request()->routeIs('admin..membresias')) active @endif">
    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z" stroke="{{ request()->routeIs('admin..membresias') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M1 10H23" stroke="{{ request()->routeIs('admin..membresias') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
  			<span class="ml-3 nav-label">Membresias</span>
  		</a>
  		<a href="/admin/usuarios" class="my-3 sidebar-item @if(request()->routeIs('admin..usuarios')) active @endif">
  			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M23 21.0009V19.0009C22.9993 18.1146 22.7044 17.2536 22.1614 16.5532C21.6184 15.8527 20.8581 15.3524 20 15.1309" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16 3.13086C16.8604 3.35116 17.623 3.85156 18.1676 4.55317C18.7122 5.25478 19.0078 6.11769 19.0078 7.00586C19.0078 7.89403 18.7122 8.75694 18.1676 9.45855C17.623 10.1602 16.8604 10.6606 16 10.8809" stroke="{{ request()->routeIs('admin..usuarios') ? 'white' : '#31348B' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
  			<span class="ml-3 nav-label">Usuarios</span>
  		</a>
    </div>
</aside>