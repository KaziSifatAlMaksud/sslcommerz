<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>চেকআউট</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ["Inter", "ui-sans-serif", "system-ui"] },
          boxShadow: { soft: "0 10px 30px rgba(0,0,0,.08)" }
        }
      }
    }
  </script>

  <style>
    html { scroll-behavior: smooth; }

    /* ---------- THEME VARIABLES (SAME AS INDEX) ---------- */
    :root{
      --bg:#070b13;
      --text:#e5e7eb;
      --muted:#cbd5e1;
      --card:rgba(255,255,255,.06);
      --border:rgba(255,255,255,.10);
      --input:rgba(0,0,0,.20);
      --header:rgba(0,0,0,.25);
    }
    [data-theme="light"]{
      --bg:#f6f7fb;
      --text:#0f172a;
      --muted:#334155;
      --card:rgba(255,255,255,.90);
      --border:rgba(15,23,42,.10);
      --input:rgba(255,255,255,.95);
      --header:rgba(255,255,255,.75);
    }

    body{ background:var(--bg); color:var(--text); }

    .bg-night{
      background:
        radial-gradient(1200px 600px at 15% 10%, rgba(99,102,241,.18), transparent 60%),
        radial-gradient(900px 500px at 90% 25%, rgba(16,185,129,.14), transparent 55%),
        radial-gradient(800px 400px at 50% 100%, rgba(236,72,153,.12), transparent 55%),
        linear-gradient(to bottom, #0b1220, #070b13);
    }
    .bg-light{
      background:
        radial-gradient(1200px 600px at 15% 10%, rgba(99,102,241,.10), transparent 60%),
        radial-gradient(900px 500px at 90% 25%, rgba(16,185,129,.09), transparent 55%),
        radial-gradient(800px 400px at 50% 100%, rgba(236,72,153,.08), transparent 55%),
        linear-gradient(to bottom, #f8fafc, #eef2ff);
    }

    .glass{
      background:var(--card);
      border:1px solid var(--border);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
    .header-bg{
      background:var(--header);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
    .muted{ color:var(--muted); }
    .input-ui{
      background:var(--input);
      border:1px solid var(--border);
      color:var(--text);
    }
    .input-ui::placeholder{ color: rgba(100,116,139,.85); }
    [data-theme="dark"] .input-ui::placeholder{ color: rgba(148,163,184,.85); }
  </style>
</head>

<body id="appBody" class="font-sans min-h-screen bg-night">

  <!-- Header -->
  <header class="sticky top-0 z-50 border-b header-bg" style="border-color: var(--border);">
    <div class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between">
      <a href="/" class="flex items-center gap-3">
       <div
            class="h-11 w-11 bg-indigo-500/20 border border-indigo-400/30 grid place-items-center"
          >
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
          </div>
        <div>
          <p class="text-sm font-semibold leading-none">সব কোর্স</p>
          <p class="text-xs muted">সিকিউর চেকআউট</p>
        </div>
      </a>

      <div class="flex gap-2 items-center">
        <button id="themeBtn" class="px-4 py-2 rounded-xl glass hover:opacity-90 transition text-sm font-semibold">
          🌙 নাইট
        </button>
        <a id="backBtn" href="index.html" class="px-4 py-2 rounded-xl glass hover:opacity-90 transition text-sm">
          ← ফিরে যান
        </a>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-6xl px-4 py-10">
    <!-- Not Found -->
    <div id="notFound" class="hidden glass rounded-3xl p-8">
      <h1 class="text-2xl font-extrabold">কোনো আইটেম সিলেক্ট করা হয়নি</h1>
      <p class="mt-2 muted">
        এভাবে ওপেন করুন: <span class="font-mono">checkout.html?item=c1</span>
      </p>
      <a href="index.html" class="mt-5 inline-flex px-5 py-3 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition font-semibold">
        হোমে ফিরে যান
      </a>
    </div>

    <div id="page" class="hidden grid lg:grid-cols-2 gap-6 items-start">
      <!-- Left: form -->
      <section class="glass rounded-3xl p-7">
        <h1 class="text-3xl font-extrabold">চেকআউট</h1>
        <p class="mt-2 muted">
          আপনার তথ্য দিন এবং পেমেন্টে এগিয়ে যান। 
        </p>

        <form id="checkoutForm" class="mt-6 space-y-4" 
            action="{{ route('checkout.store') }}" 
            method="POST" 
            enctype="multipart/form-data">
          @csrf

          @if(session('error'))
            <div class="mb-4 p-4 bg-red-500/20 border border-red-400 text-red-200 rounded-xl">
                {{ session('error') }}
            </div>
          @endif

          <input type="hidden" name="amount" id="amountInput" value="" />
          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label class="text-sm">পূর্ণ নাম</label>
              <input required name="name" placeholder="আপনার নাম" value="{{ old('name') }}"
                     class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
            </div>
            <div>
              <label class="text-sm">মোবাইল</label>
              <input required name="phone" placeholder="+880..." value="{{ old('phone') }}"
                     class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
            </div>
          </div>

          <div>
            <label class="text-sm">ইমেইল</label>
            <input required type="email" name="email" placeholder="you@example.com" value="{{ old('email') }}"
                   class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
            <p class="mt-2 text-xs muted">এই ইমেইলে অ্যাক্সেস/ডেলিভারি পাঠানো হবে।</p>
          </div>

          

          <div>
            <label class="text-sm">কুপন (ঐচ্ছিক)</label>
            <div class="mt-2 flex gap-2">
              <input id="couponInput" placeholder="SAVE10" 
                     class="w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
              <button type="button" onclick="applyCoupon()"
                      class="px-4 py-3 rounded-2xl glass hover:opacity-90 transition font-semibold">
                এপ্লাই
              </button>
            </div>
            <p id="couponMsg" class="mt-2 text-xs muted"></p>
          </div>

          <div>
            <label class="text-sm">Bkash / Nagad / Rocket (Transaction ID)</label>
            <div class="mt-2 flex gap-2">
              <input id="couponInput" placeholder="DBXX000000" name="transaction_bkash_id" value="{{ old('transaction_bkash_id') }}"
                     class="w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" required />
            </div>
           
          </div>


          <div>
             <label class="text-sm">Upload Transaction Screenshot</label>
              <!-- Attachment Upload -->
                 <!-- Preview -->
                <div id="filePreview" class="mt-4"></div>
              <div class="mt-4">
              
                <input 
                  type="file" 
                  id="transactionFile" 
                  name="transaction_file" 
                  accept="image/*" 
                  class="w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-100 file:text-indigo-700
                        hover:file:bg-indigo-200
                        cursor-pointer"
                  onchange="previewTransactionFile(event)"
                />

             
              </div>
            </div>

            <script>
            function previewTransactionFile(event) {
              const previewContainer = document.getElementById('filePreview');
              previewContainer.innerHTML = ''; // Clear previous preview

              const file = event.target.files[0];
              if (!file) return;

              const fileType = file.type;
              if (!fileType.startsWith('image/')) {
                previewContainer.innerHTML = '<p class="text-red-500 text-sm">Only image files are allowed.</p>';
                return;
              }

              const img = document.createElement('img');
              img.src = URL.createObjectURL(file);
              img.className = "mt-2 max-h-48 rounded-lg border border-gray-200";
              previewContainer.appendChild(img);
            }
            </script>



          <label class="flex items-start gap-3 text-sm">
            <input required type="checkbox" class="mt-1 h-4 w-4 rounded border-white/20 bg-black/20" />
            <span>
              আমি <a href="#" class="text-indigo-200 underline">শর্তাবলী</a>,
              <a href="#" class="text-indigo-200 underline">প্রাইভেসি</a> এবং
              <a href="#" class="text-indigo-200 underline">রিফান্ড পলিসি</a> মেনে নিচ্ছি।
            </span>
          </label>

         <button type="button" onclick="openConfirmModal()"
                class="w-full rounded-2xl bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 transition 
                      shadow-md hover:shadow-lg text-white font-semibold px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                নিশ্চিত করুন
        </button>
          {{-- <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}">   পেমেন্টে এগিয়ে যান
                </button> --}}

          <p class="text-xs muted text-center">
            
          </p>
        </form>



      </section>

      <!-- Confirm Modal -->
      <div id="confirmModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-80 text-center shadow-lg">

          <h2 class="text-lg font-semibold mb-4">আপনি কি নিশ্চিত?</h2>
          <p class="text-sm text-gray-600 mb-6">আপনি কি অর্ডারটি সাবমিট করতে চান?</p>

          <div class="flex justify-center gap-4">
            <button onclick="submitForm()"
              class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
              Yes
            </button>

            <button onclick="closeConfirmModal()"
              class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
              No
            </button>
          </div>

        </div>
      </div>

      <!-- Right: order summary -->
      <aside class="glass rounded-3xl p-7">
        <h2 class="text-xl font-bold">অর্ডার সামারি</h2>

        <div class="mt-4 rounded-2xl glass p-5">
          <!-- ✅ Image -->
          <div class="rounded-2xl overflow-hidden border" style="border-color: var(--border);">
            <img id="itemImg" src="images/course.jpg" alt="Item image" class="w-full h-80 object-cover" />
          </div>

          <p id="itemType" class="text-xs muted mt-4">—</p>
          <p id="itemTitle" class="text-lg font-bold mt-1">—</p>
          <p id="itemDesc" class="text-sm muted mt-2">—</p>

          <div id="softwareMeta" class="hidden mt-3 flex flex-wrap gap-2 text-xs">
            <span id="platform" class="px-2.5 py-1 rounded-full glass">—</span>
            <span id="license" class="px-2.5 py-1 rounded-full glass">—</span>
          </div>

          <div class="mt-4 space-y-2 text-sm">
            <div class="flex items-center justify-between">
              <span class="muted">সাবটোটাল</span>
              <span id="subtotal" class="font-semibold">—</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="muted">ডিসকাউন্ট</span>
              <span id="discount" class="font-semibold">—</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="muted">ডেলিভারি</span>
              <span class="font-semibold">ফ্রি</span>
            </div>
            <div class="border-t pt-3 flex items-center justify-between" style="border-color: var(--border);">
              <span class="font-semibold">মোট</span>
              <span id="total" class="text-2xl font-extrabold">—</span>
            </div>
          </div>
        </div>

        <div class="mt-5 rounded-2xl glass p-5">
          <p class="text-sm">পেমেন্ট মেথড / কোর্সের তথ্য</p>
          <p class="mt-1 text-sm muted">
            কোর্স ও সফটওয়্যার সম্পর্কে বিস্তারিত জানতে বা কোনো প্রশ্ন থাকলে আজই এই নম্বরে যোগাযোগ করুন।
          </p>
          <p class="mt-2 text-xs muted">  WhatsApp: ‪+880 1322‑696950‬ </p>
        </div>

        <div class="mt-5">
          <a id="detailsLink" href="details.html"
             class="inline-flex w-full justify-center items-center px-5 py-3 rounded-2xl glass hover:opacity-90 transition font-semibold">
            আইটেম ডিটেইলস দেখুন
          </a>
        </div>
      </aside>
    </div>
  </main>


  <script>

    function openConfirmModal(){
        document.getElementById('confirmModal').classList.remove('hidden');
        document.getElementById('confirmModal').classList.add('flex');
    }

    function closeConfirmModal(){
        document.getElementById('confirmModal').classList.add('hidden');
    }

    function submitForm(){
        document.getElementById('checkoutForm').submit();
    }

  </script>

  <script>
    // =========================
    // THEME (SAME AS INDEX/DETAILS)
    // =========================
    const root = document.documentElement;
    const body = document.getElementById("appBody");
    const themeBtn = document.getElementById("themeBtn");

    function setTheme(mode){
      root.setAttribute("data-theme", mode);
      if(mode === "light"){
        body.classList.remove("bg-night");
        body.classList.add("bg-light");
        themeBtn.textContent = "☀️ লাইট";
      }else{
        body.classList.remove("bg-light");
        body.classList.add("bg-night");
        themeBtn.textContent = "🌙 নাইট";
      }
      localStorage.setItem("theme", mode);
    }

    const savedTheme = localStorage.getItem("theme") || "dark";
    setTheme(savedTheme);

    themeBtn.addEventListener("click", () => {
      const current = root.getAttribute("data-theme") || "dark";
      setTheme(current === "dark" ? "light" : "dark");
    });

    // =========================
    // SAME ITEMS AS INDEX / DETAILS
    // (ADD image OPTIONAL)
    // =========================
   const courses = [
        {
          id: "c1",
           type: "course", 
          title: "🎬 Facebook Monetization Mastery",
          category: "Marketing",
          price: 349,
          rating: 4.9,
          badge: "Best Seller",
          desc: "মনেটাইজেশন, কনটেন্ট স্ট্র্যাটেজি এবং গ্রোথ সিস্টেম শিখুন।",
          includes: ["৪৫+ লেসন", "টেমপ্লেট", "কমিউনিটি"],
           image: "images/course1.jpeg",
        },
        {
          id: "c2",
          type: "course",
          title: "Video Editing Crash Course",
          category: "Creative",
          price: 349,
          rating: 4.8,
          badge: "New",
          desc: "প্রুভেন ওয়ার্কফ্লো দিয়ে দ্রুত প্রোফেশনাল ভিডিও এডিট করুন।",
          includes: ["প্রজেক্ট", "প্রিসেট", "এক্সপোর্ট সেটিংস"],
            image: "images/course2.jpeg",
        },
        {
          id: "c3",
          type: "course",
          title: "SEO for Beginners",
          category: "Marketing",
          price: 349,
          rating: 4.7,
          badge: "Popular",
          desc: "স্টেপ-বাই-স্টেপ SEO শিখে অর্গানিক ট্রাফিক বাড়ান।",
          includes: ["অন-পেজ", "অফ-পেজ", "টুলস লিস্ট"],
          image: "images/course3.jpeg",
        },
      ];

   
      const softwares = [
        {
          id: "s1",
           type: "Software", 
          title: "Canva Pro",
          category: "Design",
          price: 200,
          rating: 4.8,
          badge: "Top Tool",
          desc: "প্রিমিয়াম টেমপ্লেট, ব্র্যান্ড কিট, ব্যাকগ্রাউন্ড রিমুভার।",
          includes: ["১ বছর", "টিম ফিচার", "প্রিমিয়াম অ্যাসেটস"],
          platform: "ওয়েব",
          license: "সাবস্ক্রিপশন",
        },
        {
          id: "s2",
          type: "Software",
          category: "Design",
          price: 300,
          rating: 4.7,
          badge: "Pro",
          desc: "অ্যাডভান্সড ফটো এডিটিং ও ডিজাইন ওয়ার্কফ্লো।",
          includes: ["১ বছর", "আপডেট", "ক্লাউড স্টোরেজ"],
          platform: "Windows/Mac",
          license: "সাবস্ক্রিপশন",
        },
        {
          id: "s3",
          type: "Software",
          title: "CapCut Pro",
          category: "Video",
          price: 8,
          rating: 4.6,
          badge: "Trending",
          desc: "প্রো ইফেক্ট, ট্রানজিশন এবং এডিটিং টুলকিট।",
          includes: ["৬ মাস", "প্রিমিয়াম ইফেক্ট", "এক্সপোর্ট"],
          platform: "মোবাইল/ওয়েব",
          license: "সাবস্ক্রিপশন",
        },
      ];

    const all = [...courses, ...softwares];

    // =========================
    // HELPERS
    // =========================
    const qs = (k) => new URLSearchParams(location.search).get(k);
    const money = (n) => `৳${Number(n).toFixed(0)}`;

    // Coupon demo
    const COUPONS = { "SAVE10": 10, "SAVE20": 20 };

    let currentItem = null;
    
    let currentDiscountPct = 0;

    function renderSummary(){
      if(!currentItem) return;
      

      // ✅ image (fallback)
      const imgSrc = currentItem.image || (currentItem.type === "software" ? "images/software.jpg" : "images/course.jpg");
      document.getElementById("itemImg").src = imgSrc;
      document.getElementById("itemImg").alt = currentItem.title;

      document.getElementById("itemType").textContent =
        `${currentItem.type.toUpperCase()} • ${currentItem.category}`;

        document.getElementById("amountInput").value = currentItem.price || 0;

      document.getElementById("itemTitle").textContent = currentItem.title;
      document.getElementById("itemDesc").textContent = currentItem.desc;

      const subtotal = Number(currentItem.price || 0);
      const discountAmount = Math.round((subtotal * currentDiscountPct) / 100);
      const total = Math.max(0, subtotal - discountAmount);

      document.getElementById("subtotal").textContent = money(subtotal);
      document.getElementById("discount").textContent = discountAmount ? `- ${money(discountAmount)}` : money(0);
      document.getElementById("total").textContent = money(total);

      // software meta
      const meta = document.getElementById("softwareMeta");
      if(currentItem.type === "software"){
        meta.classList.remove("hidden");
        document.getElementById("platform").textContent = currentItem.platform || "—";
        document.getElementById("license").textContent = currentItem.license || "—";
      } else {
        meta.classList.add("hidden");
      }

      document.getElementById("detailsLink").href =
        `details.html?item=${encodeURIComponent(currentItem.id)}`;
    }

    function applyCoupon(){
      const code = (document.getElementById("couponInput").value || "").trim().toUpperCase();
      const msg = document.getElementById("couponMsg");

      if(!code){
        currentDiscountPct = 0;
        msg.textContent = "কোনো কুপন এপ্লাই করা হয়নি।";
        renderSummary();
        return;
      }

      if(COUPONS[code]){
        currentDiscountPct = COUPONS[code];
        msg.textContent = `কুপন এপ্লাই হয়েছে: ${code} (${currentDiscountPct}% ছাড়)`;
      }else{
        currentDiscountPct = 0;
        msg.textContent = "ভুল কুপন কোড।";
      }
      renderSummary();
    }
    // =========================
    // INIT
    // =========================
    const itemId = qs("item");
    currentItem = all.find(x => x.id === itemId);

    document.getElementById("backBtn").addEventListener("click", (e) => {
      e.preventDefault();
      if(history.length > 1) history.back();
      else location.href = "index.html";
    });

    if(!currentItem){
      document.getElementById("notFound").classList.remove("hidden");
    }else{
      document.getElementById("page").classList.remove("hidden");
      renderSummary();
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
