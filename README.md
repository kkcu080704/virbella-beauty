# 🌸 Virbella Beauty - Premium Beauty Blog CMS

## 👨‍💻 Identitas Pengembang (Student Identity)

Proyek ini disusun dan diajukan sebagai syarat penilaian **Ujian Akhir Semester (UAS)**.

| Kategori | Keterangan |
| :--- | :--- |
| **Nama Lengkap** | Vebra Ayu Purnama |
| **NPM / NIM** | C2383207036 |
| **Kelas** | PTI 5B |
| **Program Studi** | Pendidikan Teknologi Informasi |
| **Fakultas** | Fakultas Keguruan Ilmu Pendidikan |

---



**Virbella Beauty** adalah aplikasi *Content Management System* (CMS) modern berbasis web yang dirancang khusus untuk niche *Beauty & Lifestyle*. Proyek ini dikembangkan sebagai syarat kelulusan **Ujian Akhir Semester (UAS)** mata kuliah Pemrograman Web Lanjut. Fokus utama pengembangan aplikasi ini bukan sekadar fungsionalitas CRUD, melainkan pada **Estetika Antarmuka (UI)**, **Pengalaman Pengguna (UX)**, dan **Manajemen Konten** yang efisien menyerupai standar industri.

---

## ✨ Fitur Unggulan & Keunikan (Project Uniqueness)

Aplikasi ini memiliki diferensiasi teknis dan visual yang signifikan dibandingkan proyek blog standar:

1. **Custom "Pink Gold" Branding:** Berbeda dengan template bawaan, proyek ini menggunakan konfigurasi tema manual pada `tailwind.config.js` untuk menciptakan identitas visual yang mewah (*Luxury & Feminine*) dan konsisten di seluruh halaman.

2. **High-Readability Typography:** Mengintegrasikan plugin **@tailwindcss/typography** untuk menata konten artikel secara otomatis. Huruf, spasi, dan hierarki visual diatur agar nyaman dibaca dalam durasi lama (*Optimized Reading Experience*).

3. **Hybrid Image Logic (Smart Fallback):** Sistem cerdas dalam menangani aset visual. Jika gambar asli tidak diunggah Admin, sistem otomatis mengambil gambar estetik dari *Unsplash* yang relevan, menjaga tampilan layout tetap utuh.

4. **WYSIWYG Editor (TinyMCE):** Admin dimanjakan dengan fitur *Rich Text Editor* (TinyMCE). Penulisan artikel mendukung format lengkap (*Bold, Italic, List*) secara visual tanpa perlu menyentuh kode HTML manual.

5. **Native Social Sharing:** Fitur berbagi (*Social Sharing*) ke Facebook dan X (Twitter) yang fungsional, menggunakan API native platform tersebut dengan penyesuaian warna branding resmi masing-masing aplikasi.

---

## 🛠️ Stack Teknologi

* **Backend:** Laravel 12.x (Breeze Starter Kit)
* **Frontend:** Blade Templating, Tailwind CSS v3.4, Alpine.js
* **Database:** MySQL
* **Build Tool:** Vite
* **External Libs:** TinyMCE (CDN), Tailwind Typography Plugin

---

## 🚀 Panduan Instalasi (Langkah demi Langkah)

Ikuti instruksi berikut untuk menjalankan proyek ini di komputer lokal (Localhost):

### 1. Persiapan Sistem & Instalasi
Pastikan komputer Anda sudah terinstall PHP >= 8.2, Composer, Node.js, dan MySQL. Jalankan perintah berikut di terminal:

```bash
git clone [https://github.com/username/virbella-beauty.git](https://github.com/username/virbella-beauty.git)
cd virbella-beauty
composer install
npm install
