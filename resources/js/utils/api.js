const API_BASE_COIN = "https://api.coingecko.com/api/v3";
const API_BASE_COIN_NEWS = "https://openapiv1.coinstats.app";

export async function getCryptoCoins(vs_currency = "usd", limit = 100) {
  const res = await fetch(
    `${API_BASE_COIN}/coins/markets?vs_currency=${vs_currency}`
  );
  const data = await res.json();
  return data.slice(0, limit);
}

export async function searchCoins(key = "", limit = 10) {
  if (!key) return [];
  const res = await fetch(
    `${API_BASE_COIN}/search?query=${encodeURIComponent(key)}`
  );
  const data = await res.json();
  return data.coins.slice(0, limit);
}

export async function getCoinMarketData(ids = [], currency = "usd") {
  if (!ids.length) return [];
  const res = await fetch(
    `${API_BASE_COIN}/coins/markets?vs_currency=${currency}&ids=${ids.join(
      ","
    )}`
  );
  return await res.json();
}

export async function getCryptoNews(limit = 20) {
  const apiKey =
    import.meta.env.COINSTATS_API_KEY ??
    "9LxIS67LwTKT6evLDRZZ2lA5BCOK5DjmCGOPFrCFhtM=";
  const response = await fetch(`${API_BASE_COIN_NEWS}/news`, {
    headers: {
      "X-API-KEY": apiKey,
    },
  });
  const data = await response.json();
  return data.result || data.news || [];
}

export async function getNewsDetail(id) {
  const apiKey =
    import.meta.env.COINSTATS_API_KEY ??
    "9LxIS67LwTKT6evLDRZZ2lA5BCOK5DjmCGOPFrCFhtM=";
  const response = await fetch(
    `${API_BASE_COIN_NEWS}/news/${encodeURIComponent(id)}`,
    {
      headers: {
        "X-API-KEY": apiKey,
      },
    }
  );
  const data = await response.json();
  return data.result || data;
}
