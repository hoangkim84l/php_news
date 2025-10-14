import React from "react";

export default function NewsCard({ coin }) {
  return (
    <div
      style={{
        border: "1px solid #ccc",
        padding: "1rem",
        borderRadius: "10px",
        textAlign: "center",
      }}
    >
      <img src={coin.image} alt={coin.name} width="60" />
      <h3>{coin.name}</h3>
      <p>Giá hiện tại: ${coin.current_price}</p>
      <p>Thay đổi 24h: {coin.price_change_percentage_24h.toFixed(2)}%</p>
    </div>
  );
}
