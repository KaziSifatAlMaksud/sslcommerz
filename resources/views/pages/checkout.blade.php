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
        <div class="h-9 w-9 rounded-xl bg-indigo-500/20 border border-indigo-400/30 grid place-items-center">
          <span class="text-indigo-200 font-extrabold">AC</span>
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
          আপনার তথ্য দিন এবং পেমেন্টে এগিয়ে যান। (ডেমো — পরে গেটওয়ের সাথে কানেক্ট করবেন)
        </p>

        <form id="checkoutForm" class="mt-6 space-y-4" onsubmit="return submitOrder(event)">
          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label class="text-sm">পূর্ণ নাম</label>
              <input required name="name" placeholder="আপনার নাম"
                     class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
            </div>
            <div>
              <label class="text-sm">মোবাইল</label>
              <input required name="phone" placeholder="+880..."
                     class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui" />
            </div>
          </div>

          <div>
            <label class="text-sm">ইমেইল</label>
            <input required type="email" name="email" placeholder="you@example.com"
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

          <label class="flex items-start gap-3 text-sm">
            <input required type="checkbox" class="mt-1 h-4 w-4 rounded border-white/20 bg-black/20" />
            <span>
              আমি <a href="#" class="text-indigo-200 underline">শর্তাবলী</a>,
              <a href="#" class="text-indigo-200 underline">প্রাইভেসি</a> এবং
              <a href="#" class="text-indigo-200 underline">রিফান্ড পলিসি</a> মেনে নিচ্ছি।
            </span>
          </label>

          {{-- <button type="submit"
                  class="w-full rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition shadow-soft px-5 py-3 font-semibold">
     
          </button> --}}
          <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}">   পেমেন্টে এগিয়ে যান
                </button>

          <p class="text-xs muted text-center">
            এখানে SSLCommerz / ShurjoPay / Stripe এর রিডাইরেক্ট যুক্ত করুন।
          </p>
        </form>
      </section>

      <!-- Right: order summary -->
      <aside class="glass rounded-3xl p-7">
        <h2 class="text-xl font-bold">অর্ডার সামারি</h2>

        <div class="mt-4 rounded-2xl glass p-5">
          <!-- ✅ Image -->
          <div class="rounded-2xl overflow-hidden border" style="border-color: var(--border);">
            <img id="itemImg" src="images/course.jpg" alt="Item image" class="w-full h-40 object-cover" />
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
          <p class="text-sm">পেমেন্ট মেথড</p>
          <p class="mt-1 text-sm muted">
            Card / bKash / Nagad / Rocket (আপনার গেটওয়ের মাধ্যমে)
          </p>
          <p class="mt-2 text-xs muted">পেমেন্ট সফল হলে সাথে সাথে অ্যাক্সেস ডেলিভারি হবে।</p>
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
      { id:"c1", type:"course", title:"Facebook Monetization Masterclass", category:"Marketing", price:29, rating:4.9, badge:"Best Seller",
        desc:"Learn monetization, content strategy, and growth system.", image:"images/course.jpg" },
      { id:"c2", type:"course", title:"Video Editing Crash Course", category:"Creative", price:19, rating:4.8, badge:"New",
        desc:"Edit professional videos fast using proven workflow.", image:"images/course.jpg" },
      { id:"c3", type:"course", title:"SEO for Beginners", category:"Marketing", price:15, rating:4.7, badge:"Popular",
        desc:"Rank websites and get organic traffic step-by-step.", image:"images/course.jpg" },
    ];

    const softwares = [
      { id:"s1", type:"software", title:"Canva Pro", category:"Design", price:9, rating:4.8, badge:"Top Tool",
        desc:"Premium templates, brand kit, background remover.", platform:"Web", license:"Subscription", image:"images/software.jpg" },
      { id:"s2", type:"software", title:"Adobe Photoshop", category:"Design", price:12, rating:4.7, badge:"Pro",
        desc:"Advanced photo editing and design workflow.", platform:"Windows/Mac", license:"Subscription", image:"images/software.jpg" },
      { id:"s3", type:"software", title:"CapCut Pro", category:"Video", price:8, rating:4.6, badge:"Trending",
        desc:"Pro effects, transitions, and editing toolkit.", platform:"Mobile/Web", license:"Subscription", image:"images/software.jpg" },
    ];

    const all = [...courses, ...softwares];

    // =========================
    // HELPERS
    // =========================
    const qs = (k) => new URLSearchParams(location.search).get(k);
    const money = (n) => `$${Number(n).toFixed(0)}`;

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

    // function submitOrder(e){
    //   e.preventDefault();

    //   const form = document.getElementById("checkoutForm");
    //   const data = Object.fromEntries(new FormData(form).entries());

    //   const subtotal = Number(currentItem.price || 0);
    //   const discountAmount = Math.round((subtotal * currentDiscountPct) / 100);
    //   const total = Math.max(0, subtotal - discountAmount);

    //   const order = {
    //     itemId: currentItem.id,
    //     itemTitle: currentItem.title,
    //     amount: total,
    //     currency: "USD",
    //     discountPct: currentDiscountPct,
    //     customer: {
    //       name: data.name,
    //       phone: data.phone,
    //       email: data.email
    //     }
    //   };

    //   console.log("ORDER PAYLOAD (send to backend):", order);
    //   return false;
    // }

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
<!-- If you want to use the popup integration, -->
<script>
    var obj = {};

    $(document).ready(function () {

        $('#sslczPayBtn').on('click', function (e) {

            // 🔴 Basic form validation
            var form = document.getElementById('checkoutForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                e.preventDefault();
                return false;
            }

            // 👤 Get user input
            var formData = new FormData(form);

            var customer = {
                name: formData.get('name'),
                phone: formData.get('phone'),
                email: formData.get('email')
            };

            // 📦 Product info (from selected item)
            var product = {
                product_id: currentItem.id,
                title: currentItem.title,
                unit_price: currentItem.price,
                quantity: 1
            };

            // 🧾 Cart JSON
            var cartData = {
                customer: customer,
                product: product,
                discount_pct: currentDiscountPct
            };

            // 🔐 Data sent to backend
            obj.order = "checkout_" + currentItem.id + "_" + Date.now();
            obj.cart_json = JSON.stringify(cartData);

            // Optional (SSLCommerz standard fields)
            obj.cus_name  = customer.name;
            obj.cus_phone = customer.phone;
            obj.cus_email = customer.email;

            // Attach to button
            $('#sslczPayBtn').prop('postdata', obj);

            return true; // allow popup
        });

    });

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];

            // SANDBOX
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" +
                Math.random().toString(36).substring(7);

            // LIVE (uncomment for production)
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" +
            //     Math.random().toString(36).substring(7);

            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener
            ? window.addEventListener("load", loader, false)
            : window.attachEvent("onload", loader);
    })(window, document);
</script>

</html>
