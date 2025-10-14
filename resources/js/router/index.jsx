import React from "react";
import { Routes, Route } from "react-router-dom";
import Fast from "../pages/Fast";
import HomePage from "../pages/HomePage";
import FastDetail from "../pages/FastDetail";
import CoinDetail from "../pages/CoinDetail";
import NewsPage from "../pages/NewsPage";
import NewsDetailPage from "../pages/NewsDetailPage";

export default function Router() {
  return (
    <Routes>
      <Route path="/" element={<HomePage />} />
      <Route path="/fast" element={<Fast />} />
      <Route path="/fast/:id" element={<FastDetail />} />
      <Route path="/coin/:id" element={<CoinDetail />} />

      <Route path="/news" element={<NewsPage />} />
      <Route path="/news/:id" element={<NewsDetailPage />} />
    </Routes>
  );
}
