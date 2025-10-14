import { NavLink } from "react-router-dom";
import Router from "./router";

export default function App() {
  return (
    <div className="min-h-screen bg-gray-50 text-gray-800">
      <header className="bg-blue-600 text-white p-4 text-center text-xl font-bold">
        Crypto Dashboard
      </header>

      <nav className="flex justify-center bg-white shadow">
        <NavLink
          to="/"
          end
          className={({ isActive }) =>
            `px-6 py-3 ${
              isActive ? "border-b-2 border-blue-600 text-blue-600" : ""
            }`
          }
        >
          Trang chủ
        </NavLink>
        <NavLink
          to="/news"
          className={({ isActive }) =>
            `px-6 py-3 ${
              isActive ? "border-b-2 border-blue-600 text-blue-600" : ""
            }`
          }
        >
          Bài Viết
        </NavLink>
        <NavLink
          to="/fast"
          className={({ isActive }) =>
            `px-6 py-3 ${
              isActive ? "border-b-2 border-blue-600 text-blue-600" : ""
            }`
          }
        >
          Đi nhanh
        </NavLink>
      </nav>

      <main className="p-6">
        {/* <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/fast" element={<Fast />} />
          <Route path="/fast/:id" element={<FastDetail />} />
          <Route path="/coin/:id" element={<CoinDetail />} />
        </Routes> */}
        <Router />
      </main>
    </div>
  );
}
