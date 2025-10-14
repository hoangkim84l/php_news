import React, { useEffect, useState } from "react";
import CoinCard from "../components/CoinCard";
import SearchBar from "../components/SearchBar";
import { getCryptoCoins } from "../utils/api";

export default function HomePage() {
  const [coins, setCoins] = useState([]);
  const [filtered, setFiltered] = useState([]);

  useEffect(() => {
    async function fetchData() {
      const data = await getCryptoCoins("usd", 100);
      setCoins(data);
      setFiltered(data);
    }

    fetchData();
  }, []);

  return (
    <div>
      <h2 className="text-2xl font-semibold mb-4">🔥 Top 100 Coins</h2>
      <SearchBar setResults={setFiltered} />
      <div className="grid md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
        {filtered.map((coin) => (
          <CoinCard key={coin.id} coin={coin} />
        ))}
      </div>
    </div>
  );
}
