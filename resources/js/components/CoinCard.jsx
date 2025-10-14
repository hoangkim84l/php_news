import { Link } from "react-router-dom";

export default function CoinCard({ coin }) {
  const isUp = coin.price_change_percentage_24h >= 0;
  return (
    <Link
      to={`/coin/${coin.id}`}
      className="block p-4 bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1"
    >
      <div className="flex flex-col items-center">
        <img src={coin.image ?? coin.large} alt={coin.name} className="w-16 h-16 mb-3" />
        <h3 className="font-semibold">{coin.name}</h3>
        <p className="text-gray-600">Giá: ${coin.current_price}</p>
        <p className={isUp ? "text-green-500" : "text-red-500"}>
          24h: {coin.price_change_percentage_24h?.toFixed(2)}%
        </p>
      </div>
    </Link>
  );
}
