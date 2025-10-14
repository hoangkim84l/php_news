import React from "react";
import Header from "../components/Header";

export default function DefaultLayout({ children }) {
  return (
    <div className="bg-gray-50 min-h-screen text-gray-900">
      <Header />
      <main className="max-w-7xl mx-auto p-6">{children}</main>
    </div>
  );
}
