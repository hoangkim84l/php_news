import React from "react";
import { Link, useLocation } from "react-router-dom";

export default function Header() {
  const { pathname } = useLocation();
  return (
    <header className="bg-white shadow">
      <div className="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 className="font-bold text-xl">Crypto Info</h1>
        <nav className="space-x-6">
          <Link
            to="/"
            className={
              pathname === "/"
                ? "text-blue-600 font-semibold"
                : "text-gray-600 hover:text-blue-600"
            }
          >
            Trang chủ
          </Link>
          <Link
            to="/fast"
            className={
              pathname === "/fast"
                ? "text-blue-600 font-semibold"
                : "text-gray-600 hover:text-blue-600"
            }
          >
            Đi nhanh
          </Link>
        </nav>
      </div>
    </header>
  );
}
