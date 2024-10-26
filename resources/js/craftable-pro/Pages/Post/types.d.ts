import type { UploadedFile } from "craftable-pro/types";
import { Author } from "../Author/types";

export type Post = {
    id: string | number;
    title: string;
    slug: string;
    content: string;
    date: string;
    authors: Author[];
    created_at: string;
    updated_at: string;
    media?: UploadedFile[];
};

export type PostForm = {
    title: string;
    slug: string;
    content: string;
    date: string;
    authors: Author[];
    cover: Array<UploadedFile>;
};
