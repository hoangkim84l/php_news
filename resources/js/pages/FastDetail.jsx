import { useEffect, useState } from "react";
import axios from "axios";

export default function FastDetail() {
  const [data, setData] = useState(null);

  useEffect(() => {
    axios.get("/api/threads/quick").then((res) => setData(res.data));
  }, []);

  if (!data) return <p className="text-center mt-4">Loading...</p>;

  const { trendingPosts, new3Posts, populars, highlight, phoBienMoiPost } =
    data;

  return (
    <div className="container mx-auto px-4">
      {/* Trending */}
      <section className="my-4">
        <h2 className="text-xl font-bold mb-2">Trending:</h2>
        <div className="flex flex-wrap gap-3">
          {trendingPosts.map((item) => (
            <a
              key={item.id}
              href={`/threads/${item.slug}`}
              className="bg-gray-100 p-2 rounded hover:bg-gray-200"
            >
              {item.name}
            </a>
          ))}
        </div>
      </section>

      {/* Featured */}
      <section className="my-6">
        <h2 className="text-xl font-bold mb-2">Featured</h2>
        <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
          {new3Posts.map((item) => (
            <div
              key={item.id}
              className="border rounded shadow-sm overflow-hidden"
            >
              <img
                src={`/storage/${item.img_link}`}
                alt={item.name}
                className="w-full h-40 object-cover"
              />
              <div className="p-2">
                <span className="text-sm text-blue-500 font-bold">HOT</span>
                <h3 className="font-semibold">{item.name}</h3>
                <p className="text-xs text-gray-500">{item.author}</p>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Popular */}
      <section className="my-6">
        <h2 className="text-xl font-bold mb-2">Thịnh Hành</h2>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          {populars.map((row) => (
            <a
              key={row.id}
              href={`/threads/${row.slug}`}
              className="block hover:shadow-lg"
            >
              <img
                src={`/storage/${row.img_link}`}
                alt={row.name}
                className="w-full h-40 object-cover"
              />
              <h3 className="font-medium p-2">{row.name}</h3>
            </a>
          ))}
        </div>
      </section>

      {/* Highlight */}
      <section className="my-6">
        <h2 className="text-xl font-bold mb-2">Nổi Bật</h2>
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
          {highlight.posts.posts.map((row) => (
            <a key={row.id} href={`/threads/${row.slug}`} className="block">
              <img
                src={`/storage/${row.img_link}`}
                alt={row.name}
                className="w-full h-40 object-cover"
              />
              <h3 className="font-medium mt-1">{row.name}</h3>
            </a>
          ))}
        </div>
      </section>

      {/* Sidebar Threads */}
      <section className="my-6">
        <h2 className="text-xl font-bold mb-2">Thread Mới</h2>
        <ul className="list-disc list-inside text-gray-700">
          {phoBienMoiPost.map((row) => (
            <li key={row.id}>
              <a href={`/threads/${row.slug}`} className="hover:underline">
                {row.name}
              </a>
            </li>
          ))}
        </ul>
      </section>
    </div>
  );
}
