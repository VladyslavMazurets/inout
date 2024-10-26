import type { UploadedFile } from "craftable-pro/types";

export type Author = {
    id: string | number;
    first_name: string;
    last_name: string;
    link: string;
    created_at: string;
    updated_at: string;
    media?: UploadedFile[];
};

export type AuthorForm = {
    first_name: string;
    last_name: string;
    link: string;
    avatar: Array<UploadedFile>;
};
