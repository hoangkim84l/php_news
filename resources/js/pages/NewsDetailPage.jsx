import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { getNewsDetail } from "../utils/api";

export default function NewsDetailPage() {
  const { id } = useParams();
  const [news, setNews] = useState(null);

  useEffect(() => {
    async function fetchData() {
      const data = await getNewsDetail(id);
      setNews(data);
    }
    fetchData();
  }, [id]);

  if (!news) return <p>Đang tải...</p>;

  return (
    <div className="max-w-3xl mx-auto">
      <Link to="/news" className="text-blue-500 hover:underline">
        ← Quay lại danh sách
      </Link>
      <h1 className="text-3xl font-bold mt-3">{news.title}</h1>
      <p className="text-sm text-gray-500 mb-4">
        {news.source} • {new Date(news.feedDate).toLocaleString()}
      </p>
      {news.imgUrl && (
        <img
          src={news.imgUrl}
          alt={news.title}
          className="rounded-lg w-full mb-4"
        />
      )}
      <p className="text-lg leading-relaxed">{news.description}</p>
      {news.link && (
        <a
          href={news.link}
          target="_blank"
          rel="noopener noreferrer"
          className="text-blue-600 font-medium block mt-4"
        >
          Đọc bài gốc →
        </a>
      )}
    </div>
  );
}
