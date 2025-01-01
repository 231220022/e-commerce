<section>
  <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
    <header>
      <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Koleksi Produk</h2>
    
      <p class="max-w-md mt-4 text-gray-500">
        Temukan berbagai produk pilihan yang sesuai dengan kebutuhan dan gaya Anda.
      </p>
    </header>
    
    <div class="mt-8">
      <p class="text-sm text-gray-500">
        Menampilkan 
        <span>{{ $products->firstItem() }}</span> 
        hingga 
        <span>{{ $products->lastItem() }}</span> 
        dari 
        <span>{{ $products->total() }}</span> 
        produk
      </p>
    </div>    

    <ul class="grid gap-4 mt-4 sm:grid-cols-2 lg:grid-cols-4">
      @forelse ( $products as $product )
        
      <li>
        <a href="#" class="no-underline relative block overflow-hidden group">
        
          <img
            src="{{ asset('./storage/products/' .$product->image) }}"
            alt=""
            class="object-cover w-full h-64 transition duration-500 group-hover:scale-105 sm:h-72"
          />
        
          <div class="relative p-6 bg-white border border-gray-100">
            <p class="text-gray-700">
              @if ($product->discount > 0)
              Rp{{ number_format($product->price - ($product->price * $product->discount / 100), 0, ',', '.') }}
              <span class="text-gray-400 line-through">
                Rp{{ number_format($product->price, 0, ',', '.') }}
              </span>
              @else
              Rp{{ number_format($product->price, 0, ',', '.') }}
              @endif
            </p>
        
            <h3 class="mt-1.5 text-lg font-medium text-gray-900">{{ $product->name }}</h3>
        
            <p class="mt-1.5 line-clamp-3 text-gray-700">
              {{ $product->description }}.
            </p>
        
            <div class="flex flex-col-reverse gap-4 mt-4">
              <form action="{{ route('cart.store', $product->slug) }}" method="POST">
                @csrf
                  <button type="submit"
                  class="block w-full px-4 py-3 text-sm font-medium text-gray-900 transition bg-gray-100 hover:scale-105"
                  >
                  Tambah Ke Keranjang
                </button>
              </form>
        
              <a
                href="{{ route('checkout.buy_now', $product->slug) }}"
                class="no-underline block w-full px-4 py-3 text-sm font-medium text-white transition bg-gray-900 hover:scale-105"
              >
                Beli Sekarang
              </a>
            </d>
          </div>
        </a>
      </li>
      @empty
        
      @endforelse
      
    </ul>

    <ol class="flex justify-center gap-1 mt-8 text-xs font-medium">
      <!-- Tombol Previous -->
      @if ($products->onFirstPage())
          <li>
              <span
                  class="inline-flex items-center justify-center text-gray-300 border border-gray-100 cursor-not-allowed size-8"
              >
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                      <path
                        fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"
                      />
                  </svg>
              </span>
          </li>
      @else
          <li>
              <a href="{{ $products->previousPageUrl() }}" class="inline-flex items-center justify-center border border-gray-100 size-8">
                  <span class="sr-only">Prev Page</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                      <path
                          fill-rule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"
                        />
                  </svg>
              </a>
          </li>
      @endif
  
      <!-- Nomor Halaman -->
      @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
          @if ($page == $products->currentPage())
              <li class="block leading-8 text-center text-white bg-black border-black size-8">{{ $page }}</li>
          @else
              <li>
                  <a href="{{ $url }}" class=" no-underline block leading-8 text-center border border-gray-100 size-8">{{ $page }}</a>
              </li>
          @endif
      @endforeach
  
      <!-- Tombol Next -->
      @if ($products->hasMorePages())
          <li>
              <a href="{{ $products->nextPageUrl() }}" class="no-underline inline-flex items-center justify-center border border-gray-100 size-8">
                  <span class="sr-only">Next Page</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                      <path
                      fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
              </a>
          </li>
      @else
          <li>
              <span class="inline-flex items-center justify-center text-gray-300 border border-gray-100 cursor-not-allowed size-8">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                    <path
                    fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                  />
                  </svg>
              </span>
          </li>
      @endif
  </ol>  
  </div>
</section>