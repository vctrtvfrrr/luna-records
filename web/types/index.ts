export interface IAlbum {
  id?: string;
  name: string;
  artist: string;
  cover?: File | string;
  released_at?: string;
  duration?: number;
  stock?: number;
  price?: number;
}

export interface IAlbumIndexResponse {
  data: IAlbum[];
}

export interface IAlbumStoreRequest extends IAlbum {}

export interface IAlbumStoreResponse {
  data: IAlbum;
}

export interface IAlbumShowResponse {
  data: IAlbum & {
    tracks?: {
      number: string;
      title: string;
      duration: number;
    }[];
    tags?: string[];
  };
}

export interface INavigation {
  icon?: string;
  name: string;
  href: string;
}

export interface IOrder {
  card: string;
  expires_at: string;
  cvv: string;
  name: string;
  email: string;
  phone: string;
  address: string;
}

export interface IOrderStoreRequest extends IOrder {
  items: {
    album_id: string;
    quantity: number;
    delivery_fee: number;
  };
}

export interface IOrderStoreResponse {
  data: IOrder;
}
