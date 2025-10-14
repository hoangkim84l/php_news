import React, { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";

export default function CoinDetail() {
  const { id } = useParams();
  const [coin, setCoin] = useState(null);

  useEffect(() => {
    fetch(`https://api.coingecko.com/api/v3/coins/${id}`)
      .then((res) => res.json())
      .then((data) => setCoin(data));
  }, [id]);

  if (!coin) return <p>⏳ Đang tải...</p>;

  return (
    <div className="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
      <Link to="/" className="text-blue-500 underline">
        ← Quay lại
      </Link>
      <div className="flex items-center gap-4 mt-4">
        <img src={coin.image.large} alt={coin.name} className="w-16 h-16" />
        <div>
          <h2 className="text-2xl font-bold">{coin.name}</h2>
          <p className="text-gray-600">Symbol: {coin.symbol.toUpperCase()}</p>
        </div>
      </div>
      <p className="mt-4 text-gray-700">
        {coin.description.en?.slice(0, 300) || "No description available."}
      </p>
      <p className="mt-4 font-semibold">
        Giá hiện tại: ${coin.market_data.current_price.usd.toLocaleString()}
      </p>
      <p className="text-sm text-gray-500">
        Cập nhật: {new Date(coin.last_updated).toLocaleString()}
      </p>
    </div>
  );
}
