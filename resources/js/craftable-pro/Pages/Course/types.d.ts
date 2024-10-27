import type { UploadedFile } from "craftable-pro/types";
import { Instructor } from "../Instructor/types";

export type Course = {
    id: string | number;
    title: string;
    slug: string;
    description: string;
    price: number;
    discount: number;
    duration: number;
    instructors: Instructor[];
    content: string;
    created_at: string;
    updated_at: string;
    deleted_at: string;
    media?: UploadedFile[];
};

export type CourseForm = {
    title: string;
    slug: string;
    description: string;
    price: number;
    discount: number;
    duration: number;
    instructors_ids?: Array<string | number>;
    content: string;
    baner: Array<UploadedFile>;
};
