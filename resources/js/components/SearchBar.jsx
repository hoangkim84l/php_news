import { useState } from "react";
import { getCoinMarketData, searchCoins } from "../utils/api";

export default function SearchBar({ setResults }) {
  const [query, setQuery] = useState("");

  async function handleSearch(e) {
    const q = e.target.value;
    setQuery(q);
    if (q.length > 2) {
      const coins = await searchCoins(q);
      const ids = coins.map((c) => c.id);
      const data = await getCoinMarketData(ids);
      setResults(data);
    } else {
      setResults([]);
    }
  }

  return (
    <input
      type="text"
      placeholder="🔍 Tìm coin..."
      value={query}
      onChange={handleSearch}
      className="border px-4 py-2 w-full rounded-md"
    />
  );
}
