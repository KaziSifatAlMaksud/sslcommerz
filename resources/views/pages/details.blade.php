<!doctype html>
<html lang="bn">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ডিটেইলস</title>

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

      /* ---------- THEME VARIABLES (SAME AS INDEX) ---------- */
      :root {
        --bg: #070b13;
        --text: #e5e7eb;
        --muted: #cbd5e1;
        --card: rgba(255, 255, 255, 0.06);
        --border: rgba(255, 255, 255, 0.1);
        --input: rgba(0, 0, 0, 0.2);
        --header: rgba(0, 0, 0, 0.25);
      }

      [data-theme="light"] {
        --bg: #f6f7fb;
        --text: #0f172a;
        --muted: #334155;
        --card: rgba(255, 255, 255, 0.9);
        --border: rgba(15, 23, 42, 0.1);
        --input: rgba(255, 255, 255, 0.95);
        --header: rgba(255, 255, 255, 0.75);
      }

      body {
        background: var(--bg);
        color: var(--text);
      }

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

      /* image overlay on header image */
      .img-overlay {
        background: linear-gradient(
          to top,
          rgba(0, 0, 0, 0.65),
          rgba(0, 0, 0, 0.1),
          rgba(0, 0, 0, 0)
        );
      }
    </style>
  </head>

  <body id="appBody" class="font-sans min-h-screen bg-night">
    <!-- Header -->
    <header
      class="sticky top-0 z-50 border-b header-bg"
      style="border-color: var(--border)"
    >
      <div
        class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between"
      >
        <a href="/" class="flex items-center gap-3">
          <div
            class="h-9 w-9 rounded-xl bg-indigo-500/20 border border-indigo-400/30 grid place-items-center"
          >
            <span class="text-indigo-200 font-extrabold">AC</span>
          </div>
          <div>
            <p class="text-sm font-semibold leading-none">সব কোর্স</p>
            <p class="text-xs muted">আইটেম ডিটেইলস</p>
          </div>
        </a>

        <div class="flex gap-2 items-center">
          <!-- ✅ Theme toggle -->
          <button
            id="themeBtn"
            class="px-4 py-2 rounded-xl glass hover:opacity-90 transition text-sm font-semibold"
          >
            🌙 নাইট
          </button>

          <a
            id="backBtn"
            href="/"
            class="px-4 py-2 rounded-xl glass hover:opacity-90 transition text-sm"
          >
            ← ফিরে যান
          </a>
          <a
            id="buyTop"
            href="checkout"
            class="px-4 py-2 rounded-xl bg-indigo-500 hover:bg-indigo-400 transition text-sm font-semibold"
          >
            কিনুন
          </a>
        </div>
      </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-10">
      <div id="notFound" class="hidden glass rounded-3xl p-8">
        <h1 class="text-2xl font-extrabold">আইটেম পাওয়া যায়নি</h1>
        <p class="mt-2 muted">
          এভাবে ওপেন করুন: <span class="font-mono">details?item=c1</span>
        </p>
        <a
          href="/"
          class="mt-5 inline-flex px-5 py-3 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition font-semibold"
        >
          হোমে ফিরে যান
        </a>
      </div>

      <div id="page" class="hidden">
        <!-- ✅ TOP IMAGE HERO -->
        <section class="glass rounded-3xl overflow-hidden mb-6">
          <div class="relative">
            <img
              id="heroImg"
              src="images/course.jpg"
              alt="Item image"
              class="w-full h-56 md:h-72 object-cover"
              loading="lazy"
            />
            <div class="absolute inset-0 img-overlay"></div>

            <div class="absolute bottom-4 left-4 right-4">
              <p id="typeCatTop" class="text-xs text-white/80">—</p>
              <h1
                id="titleTop"
                class="mt-1 text-2xl md:text-4xl font-extrabold text-white"
              >
                —
              </h1>

              <div class="mt-3 flex flex-wrap gap-2">
                <span
                  id="badgeTop"
                  class="text-xs px-3 py-1 rounded-full bg-emerald-500/25 border border-emerald-300/25 text-emerald-100"
                >
                  Featured
                </span>
                <span
                  class="text-xs px-3 py-1 rounded-full bg-white/10 border border-white/10 text-white/90"
                >
                  লাইফটাইম অ্যাক্সেস
                </span>
                <span
                  class="text-xs px-3 py-1 rounded-full bg-white/10 border border-white/10 text-white/90"
                >
                  সাথে সাথে ডেলিভারি
                </span>
              </div>
            </div>
          </div>
        </section>

        <section class="grid lg:grid-cols-2 gap-6 items-start">
          <div class="glass rounded-3xl p-7">
            <p id="typeCat" class="text-xs muted">—</p>
            <h2 id="title" class="mt-2 text-3xl md:text-4xl font-extrabold">
              —
            </h2>

            <p id="desc" class="mt-4 leading-relaxed muted">—</p>

            <div class="mt-6 grid sm:grid-cols-2 gap-4">
              <div class="rounded-2xl p-4 glass">
                <p class="text-xs muted">মূল্য</p>
                <p id="price" class="text-3xl font-extrabold">—</p>
              </div>
              <div class="rounded-2xl p-4 glass">
                <p class="text-xs muted">রেটিং</p>
                <p id="rating" class="text-3xl font-extrabold">—</p>
              </div>
            </div>

            <div id="softwareMeta" class="hidden mt-4">
              <div class="flex flex-wrap gap-2 text-xs">
                <span id="platform" class="px-2.5 py-1 rounded-full glass"
                  >—</span
                >
                <span id="license" class="px-2.5 py-1 rounded-full glass"
                  >—</span
                >
              </div>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3">
              <a
                id="buyBtn"
                href="checkout"
                class="inline-flex justify-center items-center px-5 py-3 rounded-2xl bg-indigo-500 hover:bg-indigo-400 transition font-semibold"
              >
                এখনই কিনুন
              </a>
              <a
                href="#details"
                class="inline-flex justify-center items-center px-5 py-3 rounded-2xl glass hover:opacity-90 transition font-semibold"
              >
                বিস্তারিত দেখুন
              </a>
            </div>
          </div>

          <aside class="glass rounded-3xl p-7">
            <h2 class="text-xl font-bold">আপনি যা পাবেন</h2>
            <ul id="includes" class="mt-4 space-y-3"></ul>

            <div class="mt-6 rounded-2xl glass p-5">
              <p class="text-sm">সাপোর্ট</p>
              <p class="mt-1 text-lg font-bold">WhatsApp: +8801XXXXXXXXX</p>
              <p class="mt-2 text-sm muted">আপনার আসল কন্টাক্ট দিন।</p>
            </div>
          </aside>
        </section>

        <section id="details" class="mt-8 grid lg:grid-cols-3 gap-6">
          <div class="lg:col-span-2 glass rounded-3xl p-7">
            <h3 class="text-2xl font-extrabold">ওভারভিউ</h3>
            <p id="overview" class="mt-3 leading-relaxed muted">—</p>

            <div class="mt-6">
              <h4 class="text-xl font-bold">মডিউল / ফিচার</h4>
              <div id="modules" class="mt-4 space-y-3"></div>
            </div>
          </div>

          <div class="glass rounded-3xl p-7">
            <h3 class="text-2xl font-extrabold">FAQ</h3>
            <div class="mt-4 space-y-3">
              <details class="rounded-2xl glass p-4" open>
                <summary class="cursor-pointer font-semibold">
                  কখন অ্যাক্সেস পাবো?
                </summary>
                <p class="mt-2 text-sm muted">পেমেন্ট সফল হলে সাথে সাথে।</p>
              </details>
              <details class="rounded-2xl glass p-4">
                <summary class="cursor-pointer font-semibold">
                  কিভাবে ডেলিভারি হবে?
                </summary>
                <p class="mt-2 text-sm muted">ইমেইল / ড্যাশবোর্ডের মাধ্যমে।</p>
              </details>
            </div>
          </div>
        </section>
      </div>
    </main>

    <script>
      // =========================
      // THEME (SAME AS INDEX)
      // =========================
      const root = document.documentElement;
      const body = document.getElementById("appBody");
      const themeBtn = document.getElementById("themeBtn");

      function setTheme(mode) {
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

      const savedTheme = localStorage.getItem("theme") || "dark";
      setTheme(savedTheme);

      themeBtn.addEventListener("click", () => {
        const current = root.getAttribute("data-theme") || "dark";
        setTheme(current === "dark" ? "light" : "dark");
      });

      // =========================
      // DATA (ADD IMAGE HERE)
      // =========================
      const courses = [
        {
          id: "c1",
          type: "course",
          title: "Facebook Monetization Masterclass",
          category: "Marketing",
          price: 29,
          rating: 4.9,
          badge: "Best Seller",
          desc: "Learn monetization, content strategy, and growth system.",
          includes: ["45+ lessons", "Templates", "Community"],
          overview:
            "Complete monetization workflow: niche, content system, growth, and converting views to revenue.",
          modules: [
            {
              title: "Module 1: Foundation",
              bullets: ["Niche + offer", "Setup tools", "Avoid mistakes"],
            },
            {
              title: "Module 2: Content",
              bullets: ["Hooks", "Scripts", "Posting plan"],
            },
            {
              title: "Module 3: Monetization",
              bullets: ["Earnings methods", "Scaling", "Tracking"],
            },
          ],
          image: "images/course.jpg", // ✅ image
        },
        {
          id: "c2",
          type: "course",
          title: "Video Editing Crash Course",
          category: "Creative",
          price: 19,
          rating: 4.8,
          badge: "New",
          desc: "Edit professional videos fast using proven workflow.",
          includes: ["Projects", "Presets", "Export settings"],
          overview:
            "Learn editing workflow, effects, captions, and exporting for social platforms.",
          modules: [
            {
              title: "Module 1: Setup",
              bullets: ["Workspace", "Shortcuts", "Project structure"],
            },
            {
              title: "Module 2: Editing",
              bullets: ["Cuts", "Sound", "Timing"],
            },
          ],
          image: "images/course.jpg", // ✅ same image
        },
      ];

      const softwares = [
        {
          id: "s1",
          type: "software",
          title: "Canva Pro",
          category: "Design",
          price: 9,
          rating: 4.8,
          badge: "Top Tool",
          desc: "Premium templates, brand kit, background remover.",
          includes: ["1 year", "Team features", "Premium assets"],
          platform: "Web",
          license: "Subscription",
          overview:
            "Canva Pro includes premium assets, brand kit, background remover, and pro tools.",
          modules: [
            {
              title: "Features",
              bullets: ["Premium templates", "Brand kit", "Magic resize"],
            },
            {
              title: "Delivery",
              bullets: [
                "Access details sent after payment",
                "Support included",
              ],
            },
          ],
          image: "images/software.jpg", // ✅ image
        },
      ];

      const all = [...courses, ...softwares];

      const qs = (k) => new URLSearchParams(location.search).get(k);
      const money = (n) => `$${Number(n).toFixed(0)}`;

      const escapeHtml = (str) =>
        String(str)
          .replaceAll("&", "&amp;")
          .replaceAll("<", "&lt;")
          .replaceAll(">", "&gt;")
          .replaceAll('"', "&quot;")
          .replaceAll("'", "&#039;");

      const itemId = qs("item");
      const item = all.find((x) => x.id === itemId);

      if (!item) {
        document.getElementById("notFound").classList.remove("hidden");
      } else {
        document.getElementById("page").classList.remove("hidden");

        // ✅ image (fallback by type)
        const heroImg = document.getElementById("heroImg");
        const imgSrc =
          item.image ||
          (item.type === "software"
            ? "images/software.jpg"
            : "images/course.jpg");
        heroImg.src = imgSrc;
        heroImg.alt = item.title;

        // Top hero texts
        document.getElementById("typeCatTop").textContent =
          `${item.type.toUpperCase()} • ${item.category}`;
        document.getElementById("titleTop").textContent = item.title;
        document.getElementById("badgeTop").textContent =
          item.badge || "Featured";

        // Main card
        document.getElementById("typeCat").textContent =
          `${item.type.toUpperCase()} • ${item.category}`;
        document.getElementById("title").textContent = item.title;
        document.getElementById("desc").textContent = item.desc;
        document.getElementById("price").textContent = money(item.price);
        document.getElementById("rating").textContent =
          `★ ${item.rating || 4.8}`;

        document.getElementById("overview").textContent =
          item.overview || item.desc || "";

        // Includes
        const ul = document.getElementById("includes");
        ul.innerHTML = "";
        (item.includes || []).forEach((x) => {
          const li = document.createElement("li");
          li.className = "flex gap-3";
          li.innerHTML = `<span class="text-emerald-300 mt-0.5">✓</span><span>${escapeHtml(x)}</span>`;
          ul.appendChild(li);
        });

        // Modules / Features
        const wrap = document.getElementById("modules");
        wrap.innerHTML = "";
        (item.modules || []).forEach((m) => {
          const div = document.createElement("div");
          div.className = "rounded-2xl glass p-5";
          div.innerHTML = `
            <p class="text-lg font-semibold">${escapeHtml(m.title)}</p>
            <ul class="mt-3 space-y-2 text-sm list-disc list-inside">
              ${(m.bullets || []).map((b) => `<li class="muted">${escapeHtml(b)}</li>`).join("")}
            </ul>
          `;
          wrap.appendChild(div);
        });

        // Software meta
        if (item.type === "software") {
          document.getElementById("softwareMeta").classList.remove("hidden");
          document.getElementById("platform").textContent =
            item.platform || "—";
          document.getElementById("license").textContent = item.license || "—";
        }

        // Buy links
        const buyLink = `checkout?item=${encodeURIComponent(item.id)}`;
        document.getElementById("buyBtn").href = buyLink;
        document.getElementById("buyTop").href = buyLink;

        // Back
        document.getElementById("backBtn").addEventListener("click", (e) => {
          e.preventDefault();
          if (history.length > 1) history.back();
          else location.href = "/";
        });
      }
    </script>
  </body>
</html>
