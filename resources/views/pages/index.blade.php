<!doctype html>
<html lang="bn">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>সব কোর্স ও সফটওয়্যার</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { sans: ["Inter", "ui-sans-serif", "system-ui"] },
            boxShadow: { soft: "0 10px 30px rgba(0,0,0,.08)" },
          },
        },
      };
    </script>

    <style>
      html {
        scroll-behavior: smooth;
      }

      /* ---------- THEME VARIABLES ---------- */
      :root {
        --bg: #070b13;
        --text: #e5e7eb; /* slate-200 */
        --muted: #cbd5e1; /* slate-300 */
        --card: rgba(255, 255, 255, 0.06);
        --border: rgba(255, 255, 255, 0.1);
        --input: rgba(0, 0, 0, 0.2);
        --header: rgba(0, 0, 0, 0.25);
      }

      /* Light theme overrides */
      [data-theme="light"] {
        --bg: #f6f7fb;
        --text: #0f172a; /* slate-900 */
        --muted: #334155; /* slate-700 */
        --card: rgba(255, 255, 255, 0.9);
        --border: rgba(15, 23, 42, 0.1);
        --input: rgba(255, 255, 255, 0.95);
        --header: rgba(255, 255, 255, 0.75);
      }

      /* Backgrounds */
      body {
        background: var(--bg);
        color: var(--text);
      }

      /* Night gradient background */
      .bg-night {
        background:
          radial-gradient(
            1200px 600px at 15% 10%,
            rgba(99, 102, 241, 0.18),
            transparent 60%
          ),
          radial-gradient(
            900px 500px at 90% 25%,
            rgba(16, 185, 129, 0.14),
            transparent 55%
          ),
          radial-gradient(
            800px 400px at 50% 100%,
            rgba(236, 72, 153, 0.12),
            transparent 55%
          ),
          linear-gradient(to bottom, #0b1220, #070b13);
      }

      /* Light gradient background */
      .bg-light {
        background:
          radial-gradient(
            1200px 600px at 15% 10%,
            rgba(99, 102, 241, 0.1),
            transparent 60%
          ),
          radial-gradient(
            900px 500px at 90% 25%,
            rgba(16, 185, 129, 0.09),
            transparent 55%
          ),
          radial-gradient(
            800px 400px at 50% 100%,
            rgba(236, 72, 153, 0.08),
            transparent 55%
          ),
          linear-gradient(to bottom, #f8fafc, #eef2ff);
      }

      .glass {
        background: var(--card);
        border: 1px solid var(--border);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
      }

      .header-bg {
        background: var(--header);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
      }

      .muted {
        color: var(--muted);
      }

      .input-ui {
        background: var(--input);
        border: 1px solid var(--border);
        color: var(--text);
      }

      /* Make placeholders visible in both themes */
      .input-ui::placeholder {
        color: rgba(100, 116, 139, 0.85);
      } /* slate-500 */
      [data-theme="dark"] .input-ui::placeholder {
        color: rgba(148, 163, 184, 0.85);
      } /* slate-400 */
    </style>
  </head>

  <body id="appBody" class="font-sans min-h-screen bg-night">
    <!-- Header -->
    <header
      class="sticky top-0 z-50 border-b header-bg"
      style="border-color: var(--border)"
    >
      <div
        class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between gap-3"
      >
        <div class="flex items-center gap-3">
          <div
            class="h-9 w-9 rounded-xl bg-indigo-500/20 border border-indigo-400/30 grid place-items-center"
          >
            <span class="text-indigo-200 font-extrabold">AC</span>
          </div>
          <div>
            <p class="text-sm font-semibold leading-none">সব কোর্স</p>
            <p class="text-xs muted">কোর্স + সফটওয়্যার মার্কেটপ্লেস</p>
          </div>
        </div>

        <nav class="hidden md:flex items-center gap-6 text-sm">
          <a href="#courses" class="hover:opacity-90">কোর্স</a>
          <a href="#softwares" class="hover:opacity-90">সফটওয়্যার</a>
          <a href="#bundle" class="hover:opacity-90">বান্ডেল</a>
        </nav>

        <div class="flex items-center gap-2">
          <button
            id="themeBtn"
            class="px-3 py-2 rounded-xl glass hover:opacity-90 transition text-sm font-semibold"
          >
            🌙 নাইট
          </button>
          <a
            href="#bundle"
            class="px-4 py-2 rounded-xl bg-indigo-500 hover:bg-indigo-400 transition shadow-soft text-sm font-semibold"
          >
            বান্ডেল কিনুন
          </a>
        </div>
      </div>
    </header>

    <!-- Hero -->
    <section class="mx-auto max-w-6xl px-4 pt-12 pb-8">
      <div class="glass rounded-3xl p-7 md:p-10 shadow-soft">
        <div
          class="flex flex-col md:flex-row md:items-center md:justify-between gap-6"
        >
          <div>
            <div
              class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass text-xs"
            >
              <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
              পেমেন্টের পর সাথে সাথে অ্যাক্সেস
            </div>

            <h1 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight">
              এক জায়গায় দেখুন
              <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-emerald-200"
              >
                সব কোর্স ও সফটওয়্যার
              </span>
            </h1>

            <p class="mt-3 muted text-lg leading-relaxed max-w-2xl">
              সার্চ ও ফিল্টার দিয়ে আপনার সম্পূর্ণ ক্যাটালগ দেখান। নিচের অ্যারেতে
              আপনার আসল আইটেম যোগ করুন, তারপর “কিনুন” বাটনকে checkout এর
              সাথে কানেক্ট করুন।
            </p>

            <div class="mt-6 flex flex-col sm:flex-row gap-3">
              <a
                href="#courses"
                class="px-5 py-3 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition shadow-soft font-semibold text-center"
              >
                কোর্স দেখুন
              </a>
              <a
                href="#softwares"
                class="px-5 py-3 rounded-2xl glass hover:opacity-90 transition font-semibold text-center"
              >
                সফটওয়্যার দেখুন
              </a>
            </div>
          </div>

          <div class="rounded-3xl p-6 w-full md:max-w-sm glass">
            <p class="text-sm muted">দ্রুত পরিসংখ্যান</p>

            <div class="mt-3 grid grid-cols-3 gap-3 text-center">
              <div class="glass rounded-2xl p-4">
                <p class="text-xs muted">কোর্স</p>
                <p id="courseCount" class="text-xl font-bold">0</p>
              </div>
              <div class="glass rounded-2xl p-4">
                <p class="text-xs muted">সফটওয়্যার</p>
                <p id="softwareCount" class="text-xl font-bold">0</p>
              </div>
              <div class="glass rounded-2xl p-4">
                <p class="text-xs muted">বান্ডেল</p>
                <p class="text-xl font-bold">1</p>
              </div>
            </div>

            <div class="mt-4">
              <label class="text-sm">যেকোনো কিছু সার্চ করুন</label>
              <input
                id="searchInput"
                placeholder="যেমন: Photoshop, SEO, ভিডিও এডিটিং..."
                class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui"
              />
              <p class="mt-2 text-xs muted">ফিল্টার সাথে সাথে আপডেট হবে।</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Filters -->
    <section class="mx-auto max-w-6xl px-4 pb-6">
      <div class="grid md:grid-cols-3 gap-4">
        <div class="glass rounded-2xl p-4">
          <label class="text-sm">ক্যাটাগরি</label>
          <select
            id="categoryFilter"
            class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui"
          >
            <option value="all">সব</option>
          </select>
        </div>

        <div class="glass rounded-2xl p-4">
          <label class="text-sm">ধরন</label>
          <select
            id="typeFilter"
            class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui"
          >
            <option value="all">সব</option>
            <option value="course">কোর্স</option>
            <option value="software">সফটওয়্যার</option>
          </select>
        </div>

        <div class="glass rounded-2xl p-4">
          <label class="text-sm">সাজানো</label>
          <select
            id="sortFilter"
            class="mt-2 w-full rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-300/40 input-ui"
          >
            <option value="featured">ফিচার্ড</option>
            <option value="priceLow">দাম: কম → বেশি</option>
            <option value="priceHigh">দাম: বেশি → কম</option>
            <option value="ratingHigh">রেটিং: বেশি → কম</option>
          </select>
        </div>
      </div>
    </section>

    <!-- Courses -->
    <section id="courses" class="mx-auto max-w-6xl px-4 py-10">
      <div class="flex items-end justify-between gap-6">
        <div>
          <h2 class="text-3xl font-extrabold">কোর্স</h2>
          <p class="mt-2 muted">আপনার আসল কোর্স ক্যাটালগ দিয়ে রিপ্লেস করুন।</p>
        </div>
        <a
          href="#bundle"
          class="hidden md:inline-flex px-4 py-2 rounded-xl glass hover:opacity-90 transition"
          >বান্ডেল ডিল</a
        >
      </div>
      <div
        id="courseGrid"
        class="mt-7 grid sm:grid-cols-2 lg:grid-cols-3 gap-5"
      ></div>
    </section>

    <!-- Softwares -->
    <section id="softwares" class="mx-auto max-w-6xl px-4 pb-10">
      <div class="flex items-end justify-between gap-6">
        <div>
          <h2 class="text-3xl font-extrabold">সফটওয়্যার</h2>
          <p class="mt-2 muted">
            লাইসেন্স টাইপ, প্ল্যাটফর্ম এবং কী কী আছে দেখান।
          </p>
        </div>
        <a
          href="#bundle"
          class="hidden md:inline-flex px-4 py-2 rounded-xl glass hover:opacity-90 transition"
          >বান্ডেল কিনুন</a
        >
      </div>
      <div
        id="softwareGrid"
        class="mt-7 grid sm:grid-cols-2 lg:grid-cols-3 gap-5"
      ></div>
    </section>

    <!-- Bundle -->
    <section id="bundle" class="mx-auto max-w-6xl px-4 pb-16">
      <div class="glass rounded-3xl p-7 md:p-10 shadow-soft">
        <div class="grid lg:grid-cols-2 gap-8 items-start">
          <div>
            <h2 class="text-3xl font-extrabold">বান্ডেল অফার</h2>
            <p class="mt-2 muted">
              সব কোর্স + সব সফটওয়্যার একসাথে ডিসকাউন্টে বিক্রি করুন।
            </p>

            <div class="mt-6 rounded-3xl p-6 glass">
              <p class="text-sm muted">বান্ডেল মূল্য</p>
              <div class="mt-2 flex items-end gap-3">
                <div class="text-5xl font-extrabold">৳49</div>
                <div class="muted mb-2 line-through">৳199</div>
              </div>
              <p class="mt-3 text-sm">
                লাইফটাইম অ্যাক্সেস + আপডেট অন্তর্ভুক্ত।
              </p>

              <div class="mt-5 grid sm:grid-cols-2 gap-3">
                <a
                  href="checkout"
                  class="inline-flex justify-center items-center px-5 py-3 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition shadow-soft font-semibold"
                >
                  বান্ডেল কিনুন
                </a>
                <a
                  href="#courses"
                  class="inline-flex justify-center items-center px-5 py-3 rounded-2xl glass hover:opacity-90 transition font-semibold"
                >
                  আইটেম দেখুন
                </a>
              </div>

              <p class="mt-3 text-xs muted">
                টিপ: checkout কে আপনার পেমেন্ট গেটওয়ের পেজ হিসেবে সেট করুন।
              </p>
            </div>
          </div>

          <aside class="rounded-3xl p-6 glass">
            <h3 class="text-xl font-bold">বান্ডেল কেন কিনবেন?</h3>
            <ul class="mt-4 space-y-3">
              <li class="flex gap-3">
                <span class="text-emerald-500 font-bold">✓</span> একবারেই সব
                কোর্স + টুলস
              </li>
              <li class="flex gap-3">
                <span class="text-emerald-500 font-bold">✓</span> সবচেয়ে বেশি
                ছাড়
              </li>
              <li class="flex gap-3">
                <span class="text-emerald-500 font-bold">✓</span> পেমেন্টের পর
                সাথে সাথে ডেলিভারি
              </li>
              <li class="flex gap-3">
                <span class="text-emerald-500 font-bold">✓</span> সাপোর্ট
                অন্তর্ভুক্ত
              </li>
            </ul>

            <div class="mt-6 rounded-2xl p-5 glass">
              <p class="text-sm">সাহায্য দরকার?</p>
              <p class="mt-1 text-lg font-bold">WhatsApp: ‪+880 1322‑696950‬</p>
              <p class="mt-2 text-sm muted">আপনার আসল কন্টাক্ট দিন।</p>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="border-t header-bg" style="border-color: var(--border)">
      <div
        class="mx-auto max-w-6xl px-4 py-8 text-sm muted flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between"
      >
        <p>© <span id="year"></span> আপনার ব্র্যান্ড। সর্বস্বত্ব সংরক্ষিত।</p>
        <div class="flex gap-4">
          <a href="#" class="hover:opacity-90">প্রাইভেসি</a>
          <a href="#" class="hover:opacity-90">শর্তাবলী</a>
          <a href="#" class="hover:opacity-90">রিফান্ড</a>
        </div>
      </div>
    </footer>

    <script>
      // =========================
      // ১) আপনার আইটেম এখানে এডিট করুন
      // =========================
      const courses = [
        {
          id: "c1",
          title: "Facebook Monetization Masterclass",
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
          title: "Adobe Photoshop",
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

      // =========================
      // ২) থিম সেটআপ (Light/Night)
      // =========================
      const root = document.documentElement;
      const body = document.getElementById("appBody");
      const themeBtn = document.getElementById("themeBtn");

      function setTheme(mode) {
        // mode: "dark" | "light"
        root.setAttribute("data-theme", mode);
        if (mode === "light") {
          body.classList.remove("bg-night");
          body.classList.add("bg-light");
          themeBtn.textContent = "☀️ লাইট";
        } else {
          body.classList.remove("bg-light");
          body.classList.add("bg-night");
          themeBtn.textContent = "🌙 নাইট";
        }
        localStorage.setItem("theme", mode);
      }

      // init theme
      const savedTheme = localStorage.getItem("theme") || "dark";
      setTheme(savedTheme);

      themeBtn.addEventListener("click", () => {
        const current = root.getAttribute("data-theme") || "dark";
        setTheme(current === "dark" ? "light" : "dark");
      });

      // =========================
      // ৩) UI + ফিল্টার লজিক
      // =========================
      document.getElementById("year").textContent = new Date().getFullYear();
      document.getElementById("courseCount").textContent = courses.length;
      document.getElementById("softwareCount").textContent = softwares.length;

      const categoryFilter = document.getElementById("categoryFilter");
      const typeFilter = document.getElementById("typeFilter");
      const sortFilter = document.getElementById("sortFilter");
      const searchInput = document.getElementById("searchInput");

      const courseGrid = document.getElementById("courseGrid");
      const softwareGrid = document.getElementById("softwareGrid");

      const allItems = [
        ...courses.map((x) => ({ ...x, type: "course" })),
        ...softwares.map((x) => ({ ...x, type: "software" })),
      ];

      const categories = [
        "all",
        ...Array.from(new Set(allItems.map((i) => i.category))),
      ];
      categories.forEach((cat) => {
        const opt = document.createElement("option");
        opt.value = cat;
        opt.textContent = cat === "all" ? "সব" : cat;
        categoryFilter.appendChild(opt);
      });

      function money(n) {
        // চাইলে ৳ করতে পারেন: return `৳${Number(n).toFixed(0)}`;
        return `৳${Number(n).toFixed(0)}`;
      }

      function renderCard(item) {
        const isSoftware = item.type === "software";

        // ✅ SAME IMAGE FOR ALL
       const imageSrc =
            item.image || (isSoftware ? "images/software.jpg" : "images/course.jpg");

        const meta = isSoftware
          ? `<div class="mt-3 flex flex-wrap gap-2 text-xs">
         <span class="px-2.5 py-1 rounded-full glass">${item.platform}</span>
         <span class="px-2.5 py-1 rounded-full glass">${item.license}</span>
       </div>`
          : "";

        return `
                <article class="glass rounded-3xl overflow-hidden shadow-soft hover:opacity-95 transition">

                  <!-- ✅ IMAGE -->
                  <div class="relative">
                    <img
                      src="${imageSrc}"
                      alt="${item.title}"
                      class="w-full h-80 object-cover"
                      loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
                      <p class="text-xs text-white/80">
                        ${isSoftware ? "সফটওয়্যার" : "কোর্স"} • ${item.category}
                      </p>
                      <span class="text-xs px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-300/30 text-emerald-100">
                        ${item.badge || "ফিচার্ড"}
                      </span>
                    </div>
                  </div>

                  <!-- CONTENT -->
                  <div class="p-6">
                    <h3 class="text-lg font-bold">${item.title}</h3>

                    <p class="mt-3 text-sm muted leading-relaxed">
                      ${item.desc}
                    </p>

                    ${meta}

                    <div class="mt-4 flex flex-wrap gap-2">
                      ${(item.includes || [])
                        .slice(0, 3)
                        .map(
                          (x) =>
                            `<span class="text-xs px-2.5 py-1 rounded-full glass">${x}</span>`,
                        )
                        .join("")}
                    </div>

                    <div class="mt-5 flex items-center justify-between">
                      <div>
                        <p class="text-sm muted">মূল্য</p>
                        <p class="text-2xl font-extrabold">${money(item.price)}</p>
                      </div>
                      <div class="text-right">
                        <p class="text-sm muted">রেটিং</p>
                        <p class="text-sm font-semibold">★ ${item.rating || 4.8}</p>
                      </div>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3">
                      <a
                        href="details?item=${encodeURIComponent(item.id)}"
                        class="inline-flex justify-center items-center px-4 py-2.5 rounded-2xl glass hover:opacity-90 transition font-semibold"
                      >
                        বিস্তারিত
                      </a>

                      <a
                        href="checkout?item=${encodeURIComponent(item.id)}"
                        class="inline-flex justify-center items-center px-4 py-2.5 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition shadow-soft font-semibold"
                      >
                        কিনুন
                      </a>
                    </div>
                  </div>
                </article>
              `;
      }

      function applyFilters() {
        const q = (searchInput.value || "").trim().toLowerCase();
        const cat = categoryFilter.value;
        const type = typeFilter.value;
        const sort = sortFilter.value;

        let filtered = allItems.filter((item) => {
          const matchesQ =
            !q ||
            item.title.toLowerCase().includes(q) ||
            item.desc.toLowerCase().includes(q) ||
            (item.includes || []).join(" ").toLowerCase().includes(q) ||
            item.category.toLowerCase().includes(q);

          const matchesCat = cat === "all" || item.category === cat;
          const matchesType = type === "all" || item.type === type;

          return matchesQ && matchesCat && matchesType;
        });

        if (sort === "priceLow") filtered.sort((a, b) => a.price - b.price);
        if (sort === "priceHigh") filtered.sort((a, b) => b.price - a.price);
        if (sort === "ratingHigh")
          filtered.sort((a, b) => (b.rating || 0) - (a.rating || 0));
        if (sort === "featured")
          filtered.sort((a, b) => (b.rating || 0) - (a.rating || 0));

        const courseItems = filtered.filter((x) => x.type === "course");
        const softwareItems = filtered.filter((x) => x.type === "software");

        courseGrid.innerHTML = courseItems.length
          ? courseItems.map(renderCard).join("")
          : `<div class="col-span-full glass rounded-3xl p-6">কোনো কোর্স পাওয়া যায়নি।</div>`;

        softwareGrid.innerHTML = softwareItems.length
          ? softwareItems.map(renderCard).join("")
          : `<div class="col-span-full glass rounded-3xl p-6">কোনো সফটওয়্যার পাওয়া যায়নি।</div>`;
      }

      [categoryFilter, typeFilter, sortFilter].forEach((el) =>
        el.addEventListener("change", applyFilters),
      );
      searchInput.addEventListener("input", applyFilters);

      applyFilters();
    </script>
  </body>
</html>
