import React, { useEffect, useState } from "react";
import { getCryptoNews } from "../utils/api";
import { Link } from "react-router-dom";

export default function NewsPage() {
  const [news, setNews] = useState([]);

  useEffect(() => {
    async function fetchData() {
      const data = await getCryptoNews(20);
      setNews(data);
    }
    fetchData();
  }, []);

  return (
    <div>
      <h2 className="text-2xl font-semibold mb-4">
        📰 Tin tức tiền điện tử mới nhất
      </h2>
      <div className="grid md:grid-cols-3 gap-4">
        {news.map((n) => (
          <Link
            to={`/news/${n.id}`}
            key={n.id}
            className="border rounded-lg p-3 hover:shadow-md transition block"
          >
            {n.imgUrl && (
              <img
                src={n.imgUrl}
                alt={n.title}
                className="w-full h-40 object-cover rounded-md"
              />
            )}
            <h3 className="font-semibold mt-2 line-clamp-2">{n.title}</h3>
            <p className="text-sm text-gray-500 mt-1">
              {n.source || "Unknown source"}
            </p>
          </Link>
        ))}
      </div>
    </div>
  );
}
