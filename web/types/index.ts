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
