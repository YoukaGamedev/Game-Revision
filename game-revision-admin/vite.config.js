import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css', // file utama CSS kamu (bisa Tailwind)
        'resources/js/app.js',   // file utama JS kamu
      ],
      refresh: true, // otomatis reload saat file berubah (saat dev)
    }),
  ],
  build: {
    outDir: 'public/build', // hasil build disimpan di sini
    manifest: true,         // Laravel pakai manifest.json untuk load file hasil build
    emptyOutDir: true,      // bersihkan folder build sebelum build baru
  },
});
